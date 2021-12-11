<?php

namespace SoNotion\Query;

interface QueryInterface
{
    function validate();

    function toQuery(): array;
}
