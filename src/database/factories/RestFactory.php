<?php

namespace Database\Factories;

use App\Models\Rest;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class RestFactory extends Factory
{
    protected $model = Rest::class;

    public function definition()
    {
        $restStart = $this->faker->dateTimeThisMonth;

        $restEnd = (clone $restStart)->modify('+' . rand(10, 120) . ' minutes');

        $restTime = Carbon::instance($restStart)->diff($restEnd)->format('%H:%I:%S');

        return [
            'work_id' => Work::inRandomOrder()->first()->id,
            'rest_start' => $restStart->format('Y-m-d H:i:s'),
            'rest_end' => $restEnd->format('Y-m-d H:i:s'),
            'rest_time' => $restTime,
        ];
    }
}
