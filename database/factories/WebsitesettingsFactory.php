<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Websitesettings>
 */
class WebsitesettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'phone' => '#',
            'address' => '#',
            'logo' => '#',
            'favicon' => '#',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'linkedin' => '#',
            'youtube' => '#',
            'whatsapp' => '#',
            'telegram' => '#',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
