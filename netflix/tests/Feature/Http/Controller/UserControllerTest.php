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
        //Arrange
        $newData = [
            'name' => 'Coura Do vapo',
            'email' => 'coura@putas.com',
            'password' => '123'
        ];

        //Act
        $response = $this->post($this->url, $newData);

        unset($newData['password']);

        //Assert
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'user' => ['name', 'email']
            ],
            'message'
        ]);
        $this->assertDatabaseHas('users', $newData);

    }

    /**
     * @dataProvider dataForValidation
     */
    public function test_should_fail_if_data_is_incorrect($data)
    {
        
    }

    private function dataForValidation()
    {
        return [
            'Name field is empty' => ['', 'my email', 'my password'],
            'Email field is empty' => ['my name', '', 'my password'],
            'Password field is empty' => ['my name', 'my email', '']
        ];
    }

    public function test_should_update()
    {
        //Arrange
        $user = User::factory()->create();
        $id = $user->id;

        $currentData = [
            'name' => $user->name,
            'email' => $user->email
        ];

        $newData = [
            'name' => 'new name',
            'email' => 'new email'
        ];

        //Act
        $response = $this->put($this->url . '/' . $id, $newData);

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [
                'user' => ['new_name', 'new_email']
            ],
            'message'
        ]);
        $this->assertDatabaseHas('users', $newData);
        $this->assertDatabaseMissing('users', $currentData);
    }

    public function test_should_delete()
    {
        //Arrange
        $user = User::factory()->create();
        $id = $user->id;

        $currentData = [
            'name' => $user->name,
            'email' => $user->email
        ];

        //Act
        $response = $this->delete($this->url . '/' . $id);

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [],
            'message'
        ]);
        $this->assertDatabaseMissing('users', $currentData);

    }
}
