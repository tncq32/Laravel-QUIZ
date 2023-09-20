<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\User::insert([
            'name'=>'Tuncay Şeker',
            'email'=>'tuncayseker72@gmail.com',
            'email_verified_at' => now(),
            'type'=>'admin',
            'password' => '123456789', // password
            
            'remember_token' => Str::random(10),

        ]);
        \App\Models\User::factory(10)->create();
    }
}
