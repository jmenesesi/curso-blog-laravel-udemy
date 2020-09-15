<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'Juan Manuel';
        $user->email = 'com.jmenesesi@gmail.com';
        $user->password = bcrypt('meij930925');
        $user->save();
    }
}
