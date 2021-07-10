<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'description' => $this->faker->paragraph(5),
            'series_id' => Series::factory(),
            'episode_number' => 100,
            'video_id' => '570531995'
        ];
    }
}
