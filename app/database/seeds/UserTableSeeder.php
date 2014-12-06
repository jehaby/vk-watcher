<?php


class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = User::create([
            'username' => 'urf',
            'email' => 'jurfin@yahoo.com',
            'password' => Hash::make('ffffff'),
        ]);

        $user = User::create([
            'username' => 'u',
            'email' => 'kevin.smth.42@gmail.com',
            'password' => Hash::make('ffffff'),
        ]);
    }


}