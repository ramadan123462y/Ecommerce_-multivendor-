<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Coutrie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('brands')->delete();
        DB::table('categories')->delete();
        DB::table('products')->delete();
        \App\Models\Store::factory(10)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\Categorie::factory(10)->create();
        // \App\Models\Product::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CountrieSeeder::class);
        $this->call(UserSeeder::class);
    }
}
