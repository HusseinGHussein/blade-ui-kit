<?php

declare(strict_types=1);

namespace Tests\Alerts;

use Tests\ComponentTestCase;

class AlertTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        session(['success' => 'Form was successfully submitted.']);

        $expected = <<<HTML
<div role="alert" >
                    Form was successfully submitted.
            </div>
HTML;

        $this->assertComponentRenders($expected, '<x-alert/>');
    }

    /** @test */
    public function we_can_specify_a_type()
    {
        session(['error' => 'Form contains some errors.']);

        $expected = <<<HTML
<div role="alert" >
                    Form contains some errors.
            </div>
HTML;

        $this->assertComponentRenders($expected, '<x-alert type="error"/>');
    }

    /** @test */
    public function it_can_be_slotted()
    {
        session(['success' => 'Form was successfully submitted.']);

        $template = <<<HTML
<x-alert>
    {{ \$component->message() }}
</x-alert>
HTML;

        $expected = <<<HTML
<div role="alert" >
                    Form was successfully submitted.
            </div>
HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
