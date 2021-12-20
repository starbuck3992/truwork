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
                    'name' => 'Klasické kuchyně',
                    'slug' => 'kuchyne_klasicke'
                ],
                [
                    'name' => 'Moderní kuchyně',
                    'slug' => 'kuchyne_moderni'
                ],
                [
                    'name' => 'Bezúchytkové kuchyně',
                    'slug' => 'kuchyne_bezuchytkove'
                ],
                [
                    'name' => 'Skříně',
                    'slug' => 'skrine'
                ],
                [
                    'name' => 'Komerční prostory',
                    'slug' => 'komercni_prostory'
                ],
                [
                    'name' => 'Koupelny',
                    'slug' => 'koupelny'
                ],
                [
                    'name' => 'Doplňky',
                    'slug' => 'doplnky'
                ]
            ]
        );
    }
}
