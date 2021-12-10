<?php

namespace SoNotion\Resources\Materials\Mentions;

use SoNotion\Resources\Entities\User;

class UserMention extends Mention
{
    protected User $user;

    function getUser()
    {
        return $this->user;
    }
}
