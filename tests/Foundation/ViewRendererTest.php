<?php

namespace App\Tests;

use App\Foundation\ViewRenderer;
use PHPUnit\Framework\TestCase;

final class ViewRendererTest extends TestCase
{
    public function testShouldRenderGivenTemplate()
    {
        $viewRenderer = new ViewRenderer('test');

        $renderedData = $viewRenderer->render('template');
        $expected = '<p>sample-data</p>';

        $this->assertEquals($expected, $renderedData);
    }
}
