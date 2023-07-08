<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hotel;
use App\Models\Room;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'hotel_id' => Hotel::factory(),
            'number' => $this->faker->numberBetween(1, 1000),
            'size' => $this->faker->numberBetween(1, 10),
            'bath' => $this->faker->numberBetween(1, 10),
            'wifi' => $this->faker->word,
        ];
    }
}
