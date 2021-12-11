<?php

namespace SoNotion\Resources\Materials\Properties;

use SoNotion\Resources\Materials\PhoneNumber;

class PhoneNumberProperty extends Property
{
    protected ?PhoneNumber $phone_number;

    function getPhoneNumber()
    {
        return $this->phone_number;
    }
}
