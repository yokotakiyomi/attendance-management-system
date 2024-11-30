<?php

namespace Database\Factories;

use App\Models\Work;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WorkFactory extends Factory
{
    protected $model = Work::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'rest_id' => Rest::inRandomOrder()->first()->id,
            'work_start' => $this->faker->dateTimeThisMonth->format('Y-m-d H:i:s'),
            'work_end' => $this->faker->dateTimeThisMonth->format('Y-m-d H:i:s'),
            'total_work' => $this->faker->time('H:i:s'),
        ];
    }
}
