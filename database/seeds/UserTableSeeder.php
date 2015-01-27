<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use VkWatcher\User;


class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = User::create([
            'username' => 'urf',
            'email' => 'jurfin@yahoo.com',
            'password' => 'ffffff'
        ]);

        $user = User::create([
            'username' => 'u',
            'email' => 'kevin.smth.42@gmail.com',
            'password' => 'ffffff'
        ]);
    }


}