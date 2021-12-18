<?php

namespace Tests\Feature\Http\Controller;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    
    protected $url = '/api/users';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_create()
    {
        $data = [
            'name' => 'Coura Do vapo',
            'email' => 'coura@putas.com',
            'password' => '123'
        ];

        $response = $this->post($this->url, $data);

        unset($data['password']);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'user' => ['name', 'email']
            ],
            'message'
        ]);
        $this->assertDatabaseHas('users', $data);

    }

    public function test_should_update()
    {
        $user = User::factory()->create();
    }
}
