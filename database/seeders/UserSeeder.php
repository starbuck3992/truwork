<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Superman',
                'email' => 'p.svardala@seznam.cz',
                'email_verified_at' => now(),
                'password' => Hash::make('supermanrule5'),
            ],
            [
                'name' => 'Batman',
                'email' => 'batman@seznam.cz',
                'email_verified_at' => now(),
                'password' => Hash::make('batman4ever'),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'cvesprm@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('25ZK4ezCmAjFXcP4'),
            ]
        ]);
    }
}
