<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Video;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $url = '/api/videos';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_create()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $newData = [
            'title' => 'Coura SEXO ON THE BEACH',
            'description' => 'coura nas aventuras no himalaia 2???',
        ];

        //Acts
        $response = $this->post($this->url, $newData);

        //Assert
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'data' => [ 'video' ],
            'message'
        ]);
        $this->assertDatabaseHas('videos', $newData);

    }

    /**
     * @dataProvider dataForValidation
     */
    public function test_should_fail_if_data_is_incorrect($data)
    {
        //
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
        $video = Video::factory()->create();
        $id = $video->id;

        $currentData = [
            'title' => $video->title,
            'description' => $video->description
        ];

        $newData = [
            'title' => 'new title',
            'description' => 'new description'
        ];

        //Act
        $response = $this->put($this->url . '/' . $id, $newData);

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [ 'video' ],
            'message'
        ]);
        $this->assertDatabaseHas('videos', $newData);
        $this->assertDatabaseMissing('videos', $currentData);
    }

    public function test_should_delete()
    {
        //Arrange
        $video = Video::factory()->create();
        $id = $video->id;

        $currentData = [
            'title' => $video->title,
            'description' => $video->description
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
        $this->assertDatabaseMissing('videos', $currentData);

    }
}
