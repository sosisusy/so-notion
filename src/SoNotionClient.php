<?php

namespace SoNotion;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class SoNotionClient
{
    protected string $baseUrl;
    protected string $version;
    protected string $accessKey;
    protected PendingRequest $connection;

    function __construct(string $baseUrl, string $accessKey, string $version)
    {
        $this->baseUrl = $baseUrl;
        $this->accessKey = $accessKey;
        $this->version = $version;
        $this->connection = $this->makeConnection();
    }

    function makeConnection()
    {
        return Http::withHeaders([
            "Notion-Version" => $this->version,
        ])
            ->withToken($this->accessKey);
    }

    function getConnection()
    {
        return $this->connection;
    }

    function makeApiUrl(string $path)
    {
        return $this->baseUrl . $path;
    }

    function get(string $path, array $data = [])
    {
        return $this->request('get', $path, $data);
    }

    function post(string $path, array $data = [])
    {
        return $this->request('post', $path, $data);
    }

    function put(string $path, array $data = [])
    {
        return $this->request('put', $path, $data);
    }

    function patch(string $path, array $data = [])
    {
        return $this->request('patch', $path, $data);
    }

    function delete(string $path, array $data = [])
    {
        return $this->request('delete', $path, $data);
    }

    function request(string $method, string $path, array $data = []): \Illuminate\Http\Client\Response
    {
        $res = null;
        $path = $this->makeApiUrl($path);

        switch (strtolower($method)) {
            case "get":
            case "post":
            case "put":
            case "patch":
            case "delete":
                $res = $this->getConnection()->{$method}($path, $data);
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
}
