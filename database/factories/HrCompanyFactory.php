<?php

namespace Database\Factories;

use App\Models\HrCompany;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class HrCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HrCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'zipcode' => collect([1112222, 2223333, 3334444, 4445555, 6667777, 8889999])->random(),
            'address' => $this->faker->city ,
            'address_other' =>  $this->faker->streetAddress,
            'tel' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'representative' => $this->faker->name,
            'role' => collect(['free', 'standard', 'premium'])->random(),
            'is_contract' => collect([true, false])->random(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
