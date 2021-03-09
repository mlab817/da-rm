<?php

namespace Database\Factories;

use App\Models\Upload;
use App\Models\UploadType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UploadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Upload::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'upload_type_id' => UploadType::all()->random()->id,
            'title' => $this->faker->sentence,
            'url' => $this->faker->sentence,
            'user_id' => User::factory()->create(),
        ];
    }
}
