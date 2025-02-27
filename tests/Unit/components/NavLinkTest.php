<?php

declare(strict_types=1);

namespace Tests\Unit\components;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Tests\TestCase;

class NavLinkTest extends TestCase
{
    use InteractsWithViews;

    public function testActivePropAddsCorrectColorClass(): void
    {
        $view = $this->blade('<x-nav-link href="/" :active="true">Home</x-nav-link>');

        $view->assertSee("text-orange-500", false);
        $view->assertSee("font-extrabold", false);
    }

    public function testInactiveStateHasDefaultClasses(): void
    {
        $view = $this->blade(
            '<x-nav-link :active="false">Link Text</x-nav-link>',
        );

        $view->assertSee("text-gray-700", false);
        $view->assertDontSee("font-extrabold", false);
    }

    public function testClassesAreProperlyMergedWithAdditionalAttributes(): void
    {
        $view = $this->blade(
            '<x-nav-link :active="true" class="custom-class">Link Text</x-nav-link>',
        );

        $view->assertSee("custom-class", false);
    }
}
