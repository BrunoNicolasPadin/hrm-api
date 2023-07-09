<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'room_id' => Room::factory(),
            'nameGuest' => $this->faker->name('male'),
            'emailGuest' => $this->faker->email(),
            'from' => $this->faker->date('Y-m-d', '2023-08-01'),
            'end' => $this->faker->dateTimeBetween('2023-08-02', '2024-08-01'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'suspend', 'finished']),
        ];
    }
}
