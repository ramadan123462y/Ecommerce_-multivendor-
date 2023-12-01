<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(2,true),
            'slug'=>$this->faker->word(2,true),
            'description'=>$this->faker->word(2,true),


            'meta_title'=>$this->faker->word(2,true),
            'meta_descrip'=>$this->faker->word(2,true),
            'meta_keywords'=>$this->faker->word(2,true),
            'file_name'=>$this->faker->imageUrl(300,300),
        ];
    }
}
