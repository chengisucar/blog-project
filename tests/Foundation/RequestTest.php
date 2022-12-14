<?php

declare(strict_types=1);

namespace App\Tests;

use App\Foundation\Request;
use PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase
{
    /** @dataProvider provideGetData */
    public function testGetShouldReturnValue($get, $post, $key, $expected)
    {
        $request = new Request($get, $post);

        $this->assertEquals($expected, $request->get($key));
    }

    /** @dataProvider providePostData */
    public function testPostShouldReturnValue($get, $post, $key, $expected)
    {
        $request = new Request($get, $post);

        $this->assertEquals($expected, $request->post($key));
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
