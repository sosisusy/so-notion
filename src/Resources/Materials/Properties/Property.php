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

    static function new(array $data)
    {
        $type = Arr::get($data, "type");

        switch ($type) {
            case "title":
                return TitleProperty::new($data);
            case "rich_text":
                return RichTextProperty::new($data);
            case "number":
                return NumberProperty::new($data);
            case "select":
                return SelectProperty::new($data);
            case "multi_select":
                return MultiSelectProperty::new($data);
            case "date":
                return DateProperty::new($data);
            case "people":
                return PeopleProperty::new($data);
            case "files":
                return FilesProperty::new($data);
            case "checkbox":
                return CheckboxProperty::new($data);
            case "url":
                return UrlProperty::new($data);
            case "email":
                return EmailProperty::new($data);
            case "phone_number":
                return PhoneNumberProperty::new($data);
            case "formula":
                return FormulaProperty::new($data);
            case "relation":
                return RelationProperty::new($data);
            case "rollup":
                return RollupProperty::new($data);
            case "created_time":
                return CreatedTimeProperty::new($data);
            case "created_by":
                return CreatedByProperty::new($data);
            case "last_edited_time":
                return LastEditedTimeProperty::new($data);
            case "last_edited_by":
                return LastEditedByProperty::new($data);
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
