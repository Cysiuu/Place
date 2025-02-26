<?php

declare(strict_types=1);

namespace Feature;

use Tests\TestCase;

class NavigationTest extends TestCase
{
    public function testHomePage(): void
    {
        $response = $this->get("/");
        $response->assertStatus(200);
    }

    public function testExplorePage(): void
    {
        $response = $this->get("/explore");
        $response->assertStatus(200);
    }

    public function testTopPlacesPage(): void
    {
        $response = $this->get("/top-places");
        $response->assertStatus(200);
    }

    public function testCollectionsPage(): void
    {
        $response = $this->get("/collections");
        $response->assertStatus(200);
    }

    public function testNearMePage(): void
    {
        $response = $this->get("/near-me");
        $response->assertStatus(200);
    }
}
