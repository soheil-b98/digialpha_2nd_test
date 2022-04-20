<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'manager',
//            'email' => 'manager@gmail.com',
//            'password' => Hash::make('123456'),
//            'level' => 'manager'
//        ]);
        User::create([
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('123456'),
                'level' => 'manager'
            ]
        ]);
         User::factory(10)->create()->each( function ($user){
             $user->cards()->saveMany(Card::factory(rand(1,6))->make());
         });
    }
}
