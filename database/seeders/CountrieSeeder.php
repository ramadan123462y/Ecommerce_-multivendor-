<?php

namespace Database\Seeders;

use App\Models\Coutrie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coutries')->delete();
        $countries = ['Egypt', 'American', 'Francisco'];


        foreach ($countries as $countrie) {

            Coutrie::create([

                'country_name' => $countrie
            ]);
        }
    }
}
