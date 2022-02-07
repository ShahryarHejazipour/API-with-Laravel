<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=\Faker\Factory::create();
        DB::table('persons')->insert([

            'name'=> $this->$faker->name(),
            'email'=>$this->$faker->safeEmail(),
            'phone_no'=>$this->$faker->phoneNumber(),
            'age'=>$this->$faker->numberBetween(25,45),
            'gender'=>$this->$faker->randomElement(['male','female']),


        ]);

    }
}
