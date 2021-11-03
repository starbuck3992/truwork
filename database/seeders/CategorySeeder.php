<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                [
                    'name' => 'Kuchyně',
                    'slug' => 'kuchyne'
                ],
                [
                    'name' => 'Vestavěnné skříně',
                    'slug' => 'vestavenne_skrine'
                ],
                [
                    'name' => 'Komerční prostory',
                    'slug' => 'komercni_prostory'
                ],
                [
                    'name' => 'Ostatní',
                    'slug' => 'ostatni'
                ]
            ]
        );
    }
}
