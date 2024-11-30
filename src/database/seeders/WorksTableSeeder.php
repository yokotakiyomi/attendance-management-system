<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Work;
use App\Models\User;
use App\Models\Rest;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        Work::factory()->count(100)->create();
    }
}
