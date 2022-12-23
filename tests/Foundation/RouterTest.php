<?php

declare(strict_types=1);

namespace Tests\Foundation;

use App\Foundation\Request;
use App\Foundation\Router;
use PHPUnit\Framework\TestCase;

final class RouterTest extends TestCase
{
    public function testGet()
    {
        $callCounter = 0; // spy
        $router = new Router;
        $request = new Request([],[], 'GET', 'http://www.test.com/');

        $router->get('/', function() use (&$callCounter) {
            $callCounter++;
        });

        $router->dispatch($request);

        $this->assertEquals(1, $callCounter);
    }
}
