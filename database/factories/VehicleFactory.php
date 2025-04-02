<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;
use Faker\Provider\FakeCar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{

    protected $model = Vehicle::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $has_image = rand(0, 1);

        if ($has_image != 0) {
            $image = $this->faker->imageUrl(640, 480, 'technology', true);
        } else {
            $image = null;
        }

        $this->faker->addProvider(new FakeCar($this->faker));
        $vehicle = $this->faker->vehicleArray();
        return [
            'model' => $vehicle['model'],
            'brand' => $vehicle['brand'],
            'vin' => $this->faker->vin,
            'registration' => $this->faker->vehicleRegistration,
            'fuel' => $this->faker->vehicle,
            'image' => $image,
        ];
    }
}
