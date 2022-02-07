<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //برای روش فکتوری الکوینت کافی است که به صورت زیر فکتور و کلاس مدل مربوطه فراخوانی شود
        // \App\Models\User::factory(10)->create();
        \App\Models\Person::factory(100)->create();

        //برای روش کویری بیلدر و استفاده از کلاس DB باید کلاس seeder ساخته شده را به صورت زیر فراخوانی کرد
       // $this->call(PersonSeeder::class);
    }
}
