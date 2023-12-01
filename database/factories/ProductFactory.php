<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->word(2, true),
            'slug' => $this->faker->word(2, true),
            'categorie_id' => Categorie::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'small_description' => $this->faker->word(2, true),
            'description' => $this->faker->word(2, true),
            'original_price' => 11,
            'selling_price' => 11,
            'quantity' => 11,
            'status'=>1,
            'trending' => 1,
            'meta_title' => $this->faker->word(2, true),
            'meta_keyword' => $this->faker->word(2, true),
            'meta_descreption' => $this->faker->word(2, true),
            'store_id' =>  Store::inRandomOrder()->first()->id,
        ];
    }
}
