<?php

namespace Database\Factories;


use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Person::class;
    public function definition()
    {
        return [

            'name'=> $this->faker->name(),
            'email'=>$this->faker->safeEmail(),
            'phone_no'=>$this->faker->phoneNumber(),
            'age'=>$this->faker->numberBetween(25,45),
            'gender'=>$this->faker->randomElement(['male','female']),
        ];
    }
}
