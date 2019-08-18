<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionsTest extends TestCase
{
    /**
     * A basic feature test example.
     * .\vendor\bin\phpunit
     *
     * @return void
     */
    /** @test */
    public function only_logged_in_users_can_see_the_users_list() {
        $response = $this->get('/home')->assertRedirect('/login');
    }
    /** @test */
    public function only_logged_in_users_can_see_the_terms_list() {
        $response = $this->get('/terms')->assertRedirect('/login');
    }
    /** @test */
    public function everyone_can_see_the_most_recent_terms() {
        $response = $this->get('/terms_and_conditions')->assertOk();
    }
}
