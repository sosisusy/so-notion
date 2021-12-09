<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use SoNotion\SoNotionFacade;
use SoNotion\SoNotionServiceProvider;

class SoNotionTest extends TestCase
{
    protected $loadEnvironmentVariables = true;

    function getPackageProviders($app)
    {
        return [
            SoNotionServiceProvider::class,
        ];
    }
}
