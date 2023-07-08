<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Room;

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
            'end' =>  $this->faker->dateTimeBetween('2023-08-02', '2024-08-01'),
            'status' => $this->faker->randomElement(["pending","confirmed","suspend","finished"]),
        ];
    }
}
