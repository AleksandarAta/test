<?php

namespace Database\Factories;
use App\Models\DriverLicense;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DriverLicense>
 */
class DriverLicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $date = $this->faker->dateTimeBetween("-10 year", "-1 year");

        $date_till = (new Carbon($date))->addYears(10);

        // dl_number = $this->faker->regexify('[A-Z]{1}[0-9]{7}')
        return [
            "date" => $date,
            "date_till" => $date_till,
        ];
    }
}
