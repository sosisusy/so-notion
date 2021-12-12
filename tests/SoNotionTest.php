<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use SoNotion\SoNotionServiceProvider;

class SoNotionTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SoNotionServiceProvider::class
        ];
    }

    function test_true()
    {
        $this->assertTrue(true);
    }
}
