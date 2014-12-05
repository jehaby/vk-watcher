<?php


class PersonsTableSeeder extends Seeder {

    public function run()
    {
        Person::create(['id' =>'2232736']);
        Person::create(['id' =>'15779026']);
        Person::create(['id' =>'18669287']);

        DB::table('person_user')->insert(['person_id' => 15779026, 'user_id' => 1]);  // TODO: you can dob better
        DB::table('person_user')->insert(['person_id' => 2232736, 'user_id' => 1]);
        DB::table('person_user')->insert(['person_id' => 18669287, 'user_id' => 1]);
    }

}