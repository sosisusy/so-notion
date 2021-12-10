<?php

namespace SoNotion;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\UnauthorizedException;
use InvalidArgumentException;
use SoNotion\Endpoints\Database;
use SoNotion\Exceptions\SoNotionBadRequestException;
use SoNotion\Exceptions\SoNotionUnauthorizedException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class SoNotion
{
    const BASE_URI = "https://api.notion.com";
    const DATABASE = "database";
    const PAGE = "page";
    const USER = "user";
    const BLOCK = "block";

    protected string $accessKey;

    protected PendingRequest $client;

    protected string $version;

    function __construct(string $accessKey, $version = "v1")
    {
        $this->accessKey = $accessKey;
        $this->version = $version;
        $this->client = $this->makeConnection();
    }

    function makeConnection()
    {
        return Http::withHeaders([
            "Notion-Version" => "2021-08-16",
        ])
            ->withToken($this->accessKey);
    }

    function baseUrl()
    {
        return static::BASE_URI . "/" . $this->version;
    }

    function apiUrl(string $path)
    {
        return $this->baseUrl() . $path;
    }

    function get(string $path, array $data = [])
    {
        return $this->send('get', $path, $data);
    }

    function post(string $path, array $data = [])
    {
        return $this->send('post', $path, $data);
    }

    function put(string $path, array $data = [])
    {
        return $this->send('put', $path, $data);
    }

    function patch(string $path, array $data = [])
    {
        return $this->send('patch', $path, $data);
    }

    function delete(string $path, array $data = [])
    {
        return $this->send('delete', $path, $data);
    }

    function send(string $method, string $path, array $data = []): \Illuminate\Http\Client\Response
    {
        $res = null;
        $path = $this->apiUrl($path);
        switch (strtolower($method)) {
            case "get":
            case "post":
            case "put":
            case "patch":
            case "delete":
                $res = $this->client->{$method}($path, $data);
                break;
            default:
                throw new InvalidArgumentException("{$method} 은 Http 메서드가 아닙니다.");
        }

        if ($res->failed()) {
            $body = json_decode($res->body(), true);

            switch ($res->status()) {
                case 401:
                    throw new UnauthorizedException($body["message"] ?? "", $res->status());
                case 400:
                    throw new BadRequestException($body["message"] ?? "", $res->status());
            }
        }

        return $res;
    }

    /**
     * 데이터베이스 클라이언트 리턴
     */
    function database()
    {
        return new Database($this);
    }
}
