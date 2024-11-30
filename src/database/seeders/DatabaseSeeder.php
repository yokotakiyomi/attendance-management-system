<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(100)->create();
        Work::factory(100)->create();
        Rest::factory(100)->create();
    }
}

