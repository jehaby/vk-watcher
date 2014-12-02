<?php


class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = User::create([
            'username' => 'urf',
            'email' => 'jurfin@yahoo.com',
            'password' => Hash::make('ffffff'),
        ]);
    }


}