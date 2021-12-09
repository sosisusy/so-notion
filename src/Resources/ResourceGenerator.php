<?php

namespace SoNotion\Resources;

use SoNotion\Exceptions\SoNotionDataException;
use SoNotion\Resources\Blocks\Block;

class ResourceGenerator
{

    protected array $body;

    function __construct($body)
    {
        $this->body = $this->ready($body);
    }

    public static function parse($body)
    {
        $instance = new static($body);

        return $instance->make();
    }

    public function make()
    {
        $objectType = $this->body["object"];
        $result = null;

        switch ($objectType) {
            case "list":
                $result = Collection::new($this->body);
                break;
            case "database":
                $result = Database::new($this->body);
                break;
            case "user":
                $result = User::new($this->body);
                break;
            case "page":
                $result = Page::new($this->body);
                break;
            case "block":
                $result = Block::new($this->body);
                break;
        }

        return $result;
    }

    function ready($body): array
    {
        if (is_array($body)) return $body;
        if (is_string($body)) return $this->decodeJson($body);
        if (is_object($body)) return $this->objectToArray($body);

        throw new SoNotionDataException("처리 할 수 없는 데이터입니다.");
    }

    function decodeJson(string $body)
    {
        return json_decode($body, JSON_UNESCAPED_UNICODE);
    }

    function objectToArray(object $body)
    {
        if (method_exists($body, "toArray")) return $body->toArray();

        return (array) $body;
    }
}
