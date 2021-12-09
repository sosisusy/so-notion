<?php

namespace SoNotion\Resources;

use Illuminate\Support\Arr;

/**
 * 텍스트 객체
 */
class RichText extends Resource
{
    protected string $plain_text;

    protected ?string $href = null;

    protected TextAnnotation $annotations;

    /**
     * 항목: ["text", "mention", "equation"]
     */
    protected string $type;

    protected ?Text $text = null;

    protected ?Mention $mention = null;

    protected ?Equation $equation = null;

    function __construct(array $data)
    {
        $this->plain_text = $data["plain_text"];
        $this->href = $data["href"];
        $this->annotations = TextAnnotation::new($data["annotations"]);
        $this->type = $data["type"];

        switch ($this->type) {
            case "text":
                $this->text = Text::new($data["text"]);
                break;
            case "mention":
                $this->mention = Mention::new($data["mention"]);
                break;
            case "equation":
                $this->equation = Equation::new($data["equation"]);
                break;
        }
    }

    function getHiddenProperties(): array
    {
        $hidden = ["text", "mention", "equation"];

        return Arr::where($hidden, function ($value) {
            return $value != $this->type;
        });
    }

    function getPlainText()
    {
        return $this->plain_text;
    }

    function getHref()
    {
        return $this->href;
    }

    function getAnnotations()
    {
        return $this->annotations;
    }

    function getType()
    {
        return $this->type;
    }

    function getText()
    {
        return $this->text;
    }

    function getMention()
    {
        return $this->mention;
    }

    function getEquation()
    {
        return $this->equation;
    }
}
