<?php

namespace SoNotion\Resources\Materials\Properties;

use Illuminate\Support\Arr;
use SoNotion\Exceptions\HandlingException;
use SoNotion\Resources\Resource;

class Property extends Resource
{
    protected ?string $id = null;
    protected string $type;
    protected ?string $name = null;

    static function new(?array $data)
    {
        if (is_null($data)) return null;

        $type = Arr::get($data, "type");

        switch ($type) {
            case "title":
                return new TitleProperty($data);
            case "rich_text":
                return new RichTextProperty($data);
            case "number":
                return new NumberProperty($data);
            case "select":
                return new SelectProperty($data);
            case "multi_select":
                return new MultiSelectProperty($data);
            case "date":
                return new DateProperty($data);
            case "people":
                return new PeopleProperty($data);
            case "files":
                return new FilesProperty($data);
            case "checkbox":
                return new CheckboxProperty($data);
            case "url":
                return new UrlProperty($data);
            case "email":
                return new EmailProperty($data);
            case "phone_number":
                return new PhoneNumberProperty($data);
            case "formula":
                return new FormulaProperty($data);
            case "relation":
                return new RelationProperty($data);
            case "rollup":
                return new RollupProperty($data);
            case "created_time":
                return new CreatedTimeProperty($data);
            case "created_by":
                return new CreatedByProperty($data);
            case "last_edited_time":
                return new LastEditedTimeProperty($data);
            case "last_edited_by":
                return new LastEditedByProperty($data);
        }

        throw new HandlingException("invalid type");
    }

    function getId()
    {
        return $this->id;
    }

    function getType()
    {
        return $this->type;
    }

    function getName()
    {
        return $this->name;
    }
}
