<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CreateSeriesTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_a_user_can_create_a_series()
    {
        $this->withoutExceptionHandling();

        Storage::fake(config('filesystems.default'));


        $this->post('/admin/series', [
            'title' => 'this is a title',
            'description' => 'this is the description',
            'image' => UploadedFile::fake()->image('new-img.png')
        ])->assertRedirect()
            ->assertSessionHas('Success', 'Series created successfully.');


        Storage::disk(config('filesystems.default'))->assertExists('series/' . Str::slug('this is a title') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('this is a title')
        ]);
    }


    public function test_a_series_must_be_created_with_title_and_description()
    {
        $this->post('/admin/series', [
            'image' => UploadedFile::fake()->image('new-img.png')
        ])->assertSessionHasErrors(['title', 'description']);
    }

    public function test_a_series_must_be_created_with_image()
    {
        $this->post('/admin/series', [
            'title' => 'this is a title',
            'description' => 'this is the description',
        ])->assertSessionHasErrors('image');
    }

    public function test_a_series_must_be_created_with_image_that_must_be_image()
    {
        $this->post('/admin/series', [
            'title' => 'this is a title',
            'description' => 'this is the description',
            'image' => 'string-name'
        ])->assertSessionHasErrors('image');
    }


    public function test_a_series_must_be_created_with_image_that_must_be_150_200()
    {
        $this->post('/admin/series', [
            'title' => 'this is a title',
            'description' => 'this is the description',
            'image' => UploadedFile::fake()->image('new-img.png', 150, 100)
        ])->assertSessionHasErrors('image');
    }
}
