<?php

namespace Tests\Feature;

use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateSeriesTest extends TestCase
{
    public function test_a_user_can_update_a_series()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();

        $this->loginAdmin();

        $series = Series::factory()->make();

        $this->putJson("admin/series/{$series->slug}", [
            'title' => "updated title",
            'description' => "updated description",
            'image' => UploadedFile::fake()->image('new-img.png')
        ])->assertStatus(200);

        Storage::disk(config('filesystems.default'))->assertExists('series/' . Str::slug('updated title') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('updated title'),
            'img_url' => 'series/updated-title.png'
        ]);
    }


    public function test_image_is_not_required_to_update_a_series()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();

        $this->loginAdmin();

        $series = Series::factory()->make();

        $this->putJson("admin/series/{$series->slug}", [
            'title' => "updated title",
            'description' => "updated description",
        ])->assertStatus(200);

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('updated title'),
            'img_url' => 'series/updated-title.png'
        ]);
    }
}
