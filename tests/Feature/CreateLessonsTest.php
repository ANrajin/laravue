<?php

namespace Tests\Feature;

use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateLessonsTest extends TestCase
{
    public function test_a_user_can_create_lesson()
    {
        $this->withoutExceptionHandling();
        $this->loginAdmin();
        $this->withoutMiddleware();

        $series = Series::factory()->make();

        $lesson = [
            'title' => 'new lessons 147',
            'description' => 'hello description',
            'episode_number' => 25,
            'video_id' => 23365
        ];

        $this->postJson("admin/series/{$series->slug}/lesson", $lesson)->assertStatus(201)->assertJson($lesson);

        $this->assertDatabaseHas('lessons', [
            'title' => 'new lessons 147'
        ]);
    }


    public function test_a_title_is_required_to_create_a_lesson()
    {
        $this->loginAdmin();
        $this->withoutMiddleware();

        $series = Series::factory()->make();

        $lesson = [
            'description' => 'hello description',
            'episode_number' => 25,
            'video_id' => 23365
        ];

        $this->post("admin/series/{$series->slug}/lesson", $lesson)->assertSessionHasErrors('title');
    }


    public function test_a_title_is_string_to_create_a_lesson()
    {
        $this->loginAdmin();
        $this->withoutMiddleware();

        $series = Series::factory()->make();

        $lesson = [
            'title' => 123,
            'description' => 'hello description',
            'episode_number' => 25,
            'video_id' => 23365
        ];

        $this->post("admin/series/{$series->slug}/lesson", $lesson)->assertSessionHasErrors('title');
    }


    public function test_a_description_is_required_to_create_a_lesson()
    {
        $this->loginAdmin();
        $this->withoutMiddleware();

        $series = Series::factory()->make();

        $lesson = [
            'title' => 'a new lesson',
            'episode_number' => 25,
            'video_id' => 23365
        ];

        $this->post("admin/series/{$series->slug}/lesson", $lesson)->assertSessionHasErrors('description');
    }
}
