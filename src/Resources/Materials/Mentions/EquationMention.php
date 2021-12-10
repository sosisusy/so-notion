<?php

namespace SoNotion\Resources\Materials\Mentions;

use SoNotion\Resources\Materials\Equation;

class EquationMention extends Mention
{
    protected Equation $equation;

    function getEquation()
    {
        return $this->equation;
    }
}
