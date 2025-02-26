<?php

declare(strict_types=1);

namespace Tests\Unit\components;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Tests\TestCase;

class NavLinkMobileTest extends TestCase
{
    use InteractsWithViews;

    public function testActivePropAddsCorrectColorClass(): void
    {
        $view = $this->blade('<x-nav-link-mobile href="/" :active="true">Home</x-nav-link-mobile>');

        $view->assertSee("bg-orange-500", false);
        $view->assertSee("font-extrabold", false);
    }

    public function testInactiveStateHasDefaultClasses(): void
    {
        $view = $this->blade(
            '<x-nav-link-mobile :active="false">Link Text</x-nav-link-mobile>',
        );

        $view->assertSee("text-gray-700", false);
        $view->assertDontSee("font-extrabold", false);
    }

    public function testClassesAreProperlyMergedWithAdditionalAttributes(): void
    {
        $view = $this->blade(
            '<x-nav-link-mobile :active="true" class="custom-class">Link Text</x-nav-link-mobile>',
        );

        $view->assertSee("custom-class", false);
    }
}
