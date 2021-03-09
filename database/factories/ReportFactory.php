<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\Report;
use App\Models\ReportPeriod;
use App\Models\Upload;
use App\Models\UploadType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'office_id'         => Office::all()->random()->id,
            'report_period_id'  => ReportPeriod::all()->random()->id,
            'upload_id'         => Upload::factory()->create(),
        ];
    }
}
