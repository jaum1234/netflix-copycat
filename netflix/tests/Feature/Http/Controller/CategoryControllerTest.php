<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Category;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $url = '/api/categories';
    protected array $header;

    public function setUp() : void
    {
        parent::setUp();
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $this->header = ["Authorization" => "Bearer " . $token];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_create()
    {
        
        //Arrange
        $newData = [
            'name' => 'Coura Do vapo'
        ];

        //Act
        $response = $this->post($this->url, $newData, $this->header);

        //Assert
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'category' => ['name']
            ],
            'message'
        ]);
        $this->assertDatabaseHas('categories', $newData);

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
            'Name field is empty' => [''],
        ];
    }

    public function test_should_update()
    {
        //Arrange
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();
        $id = $category->id;

        $currentData = [
            'name' => $category->name,
        ];

        $newData = [
            'name' => 'new name',
        ];

        //Act
        $response = $this->put($this->url . '/' . $id, $newData, $this->header);


        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [
                'category' => ['new_name']
            ],
            'message'
        ]);
        $this->assertDatabaseHas('categories', $newData);
        $this->assertDatabaseMissing('categories', $currentData);
    }

    public function test_should_delete()
    {
        //Arrange
        $category = Category::factory()->create();
        $id = $category->id;

        $currentData = [
            'name' => $category->name,
        ];

        //Act
        $response = $this->delete($this->url . '/' . $id, [], $this->header);

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [],
            'message'
        ]);
        $this->assertDatabaseMissing('categories', $currentData);

    }
}
