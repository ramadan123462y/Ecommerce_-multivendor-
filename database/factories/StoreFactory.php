<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{

    public function definition()
    {
        $name = $this->faker->word(2, true);
        return [
            'name' => $name,
            'slug' => "slug",
            'description' => $this->faker->word(3, true),
            'image_logo' => $this->faker->imageUrl(300, 300),
            'image_cover' => $this->faker->imageUrl(300, 300),
        ];
    }
}
