<?php

namespace App\Tests;

use App\Foundation\ViewRenderer;
use PHPUnit\Framework\TestCase;

final class ViewRendererTest extends TestCase
{
    /**
     * @dataProvider provideRenderTemplate
     */
    public function testShouldRenderGivenTemplate($template, $expectedRenderedContent)
    {
        $viewRenderer = new ViewRenderer(__DIR__ . '/fixtures/templates/');

        $renderedContent = $viewRenderer->render($template, [
            'title' => 'asdfasdfasf',
        ]);

        $this->assertEquals($expectedRenderedContent, $renderedContent);
    }

    public function provideRenderTemplate(): array
    {
        return [
            [
                'template' => 'empty',
                'expectedRenderedContent' => '',
            ],
            [
                'template' => 'not-empty',
                'expectedRenderedContent' => '<p>sample-data</p>',
            ]
        ];
    }    
}
