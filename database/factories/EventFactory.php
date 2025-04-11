<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'image' => 'default.jpg', // or leave null if you're not storing images
            'date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];
    }
}
