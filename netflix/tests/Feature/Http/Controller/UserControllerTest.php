<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $url = '/api/users';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_create_user()
    {
        $response = $this->post($this->url, [
            'name' => 'Coura Do vapo',
            'email' => 'coura@putas.com',
            'password' => '123'
        ]);

        $response->assertStatus(200);
    }
}
