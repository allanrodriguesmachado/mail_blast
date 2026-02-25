<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'subject' => $this->faker->sentence(),
            'email_list_id' => 1,
            'template_id' => 2,
            'track_click' => $this->faker->boolean(),
            'track_open' => $this->faker->boolean(),
            'body' => $this->faker->paragraph(),
            'sent_at' => null,
        ];
    }
}
