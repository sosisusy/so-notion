<?php

namespace Tests;

use Illuminate\Validation\UnauthorizedException;
use Orchestra\Testbench\TestCase;
use SoNotion\SoNotionServiceProvider;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class SoNotionTest extends TestCase
{
    protected $loadEnvironmentVariables = true;

    function getPackageProviders($app)
    {
        return [
            SoNotionServiceProvider::class,
        ];
    }

    /**
     * badrequest 400
     */
    function badRequestException()
    {
        $this->expectException(BadRequestException::class);
    }

    /**
     * unauthorized 401
     */
    function unauthorizedException()
    {
        $this->expectException(UnauthorizedException::class);
    }
}
