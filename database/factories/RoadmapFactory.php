<?php

namespace Database\Factories;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\Report;
use App\Models\Roadmap;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadmapFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Roadmap::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'commodity_id' => Commodity::all()->random()->id,
            'report_id' => Report::factory()->create(),
            'start_date' => $this->faker->date('Y-m-d'),
            'participants_involved' => $this->faker->paragraph,
            'activities_done' => $this->faker->paragraph,
            'activities_ongoing' => $this->faker->paragraph,
            'overall_status' => $this->faker->sentence,
            'report_date' => $this->faker->date('Y-m-d'),
            'upload_id' => Upload::factory()->create(),
            'user_id' => User::factory()->create(),
        ];
    }
}
