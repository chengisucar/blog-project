<?php

declare(strict_types=1);

namespace Tests\Foundation;

use App\Foundation\Request;
use LDAP\Result;
use PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase
{
    /** @dataProvider provideGetData */
    public function testGetShouldReturnValue($get, $post, $key, $expected)
    {
        $request = new Request($get, $post, 'GET', '/');

        $this->assertEquals($expected, $request->get($key));
    }

    /** @dataProvider providePostData */
    public function testPostShouldReturnValue($get, $post, $key, $expected)
    {
        $request = new Request($get, $post, 'GET', '/');

        $this->assertEquals($expected, $request->post($key));
    }

    /** @dataProvider provideMethodData */
    public function testMethodShouldReturnValue($method, $expected)
    {
        $request = new Request([], [], $method, '/');

        $this->assertEquals($expected, $request->method());
    }

    /** @dataProvider provideURIData */
    public function testPathShouldReturnValue($uri, $expected)
    {
        $request = new Request([], [], 'GET', $uri);

        $this->assertEquals($expected, $request->path());
    }

    public function provideURIData()
    {
        return [
            [
                'uri' => 'http://google.com/path/to/resource?get=something',
                'expected' => '/path/to/resource',
            ],
            [
                'uri' => 'http://billie.io/path/to/resource/',
                'expected' => '/path/to/resource/',
            ],
            [
                'uri' => 'http://localhost',
                'expected' => '/',
            ],
        ];
    }

    public function provideMethodData()
    {
        return [
            [
                'method' => 'GET',
                'expected' => 'GET',
            ],
            [
                'method' => 'POST',
                'expected' => 'POST',
            ]
            ];
    }

    public function provideGetData(): array
    {
        return [
            [
                'get' => ['foo' => 'bar'], 
                'post' => [],
                'key' => 'foo',
                'expected' => 'bar',
            ],
            [
                'get' => ['john' => 'doe'], 
                'post' => [],
                'key' => 'john',
                'expected' => 'doe',
            ],
            [
                'get' => ['john' => null], 
                'post' => [],
                'key' => 'john',
                'expected' => null,
            ],
            [
                'get' => ['foo' => null], 
                'post' => [],
                'key' => 'john',
                'expected' => null,
            ],
        ];
    }

    public function providePostData(): array
    {
        return [
            [
                'get' => [],
                'post' => ['foo' => 'bar'], 
                'key' => 'foo',
                'expected' => 'bar',
            ],
            [
                'get' => [],
                'post' => ['john' => 'doe'], 
                'key' => 'john',
                'expected' => 'doe',
            ],
            [
                'get' => [],
                'post' => ['john' => null], 
                'key' => 'john',
                'expected' => null,
            ],
            [
                'get' => [],
                'post' => ['foo' => null], 
                'key' => 'john',
                'expected' => null,
            ],
        ];
    }    
}

// $request->path() google.com/path/to/something?query=asdaf --> path/to/something