<?php

namespace Tests\Unit\components;

use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class NavLinkMobileTest extends TestCase
{

    use InteractsWithViews;

    public function test_active_prop_adds_correct_color_class(): void
    {
        $view = $this->blade('<x-nav-link-mobile href="/" :active="true">Home</x-nav-link-mobile>');

        $view->assertSee('bg-orange-500', false);
        $view->assertSee('font-extrabold', false);
    }

    public function test_inactive_state_has_default_classes()
    {
        $view = $this->blade(
            '<x-nav-link-mobile :active="false">Link Text</x-nav-link-mobile>'
        );

        $view->assertSee('text-gray-700', false);
        $view->assertDontSee('font-extrabold', false);
    }

    public function test_classes_are_properly_merged_with_additional_attributes()
    {
        $view = $this->blade(
            '<x-nav-link-mobile :active="true" class="custom-class">Link Text</x-nav-link-mobile>'
        );

        $view->assertSee('custom-class', false);
    }

}
