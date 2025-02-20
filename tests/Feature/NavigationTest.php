<?php

namespace Feature;

use Tests\TestCase;

class NavigationTest extends TestCase{

    public function test_home_page(): void{
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_explore_page(): void{
        $response = $this->get('/explore');
        $response->assertStatus(200);
    }

    public function test_top_places_page(): void{
        $response = $this->get('/top-places');
        $response->assertStatus(200);
    }

    public function test_collections_page(): void{
        $response = $this->get('/collections');
        $response->assertStatus(200);
    }

    public function test_near_me_page(): void{
        $response = $this->get('/near-me');
        $response->assertStatus(200);
    }

}
