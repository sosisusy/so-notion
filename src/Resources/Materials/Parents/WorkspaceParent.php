<?php

namespace SoNotion\Resources\Materials\Parents;

class WorkspaceParent extends ParentObject
{
    protected bool $workspace;

    function getWorkspace()
    {
        return $this->workspace;
    }
}
