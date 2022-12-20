<?php

namespace Tests\Foundation;

use App\Foundation\ViewRenderer;
use PHPUnit\Framework\TestCase;

final class ViewRendererTest extends TestCase
{
    /**
     * @dataProvider provideRenderTemplate
     */
    public function testShouldRenderGivenTemplate($template, $attributes, $expectedRenderedContent)
    {
        $viewRenderer = new ViewRenderer(__DIR__ . '/fixtures/templates/');

        $renderedContent = $viewRenderer->render($template, $attributes);

        $this->assertEquals($expectedRenderedContent, $renderedContent);
    }

    public function provideRenderTemplate(): array
    {
        return [
            [
                'template' => 'empty',
                'attributes' => [],
                'expectedRenderedContent' => '',
            ],
            [
                'template' => 'not-empty',
                'attributes' => ['title' => 'sample-data'],
                'expectedRenderedContent' => '<p>sample-data</p>',
            ]
        ];
    }    
}
