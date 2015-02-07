<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Person;


class PersonsTableSeeder extends Seeder {
    
    public function run()
    {
        Person::create(['id' =>'2232736', 'first_name' => 'Стас', 'last_name' => 'Макаров']);
        Person::create(['id' =>'15779026', 'first_name' => 'Лена', 'last_name' => 'Беляева']);
        Person::create(['id' =>'18669287', 'first_name' => 'Игорь', 'last_name' => 'Престолов']);
        DB::table('person_user')->insert(['person_id' => 15779026, 'user_id' => 1]);  // TODO: you can dob better
        DB::table('person_user')->insert(['person_id' => 2232736, 'user_id' => 1]);
        DB::table('person_user')->insert(['person_id' => 18669287, 'user_id' => 1]);
    }
    
}