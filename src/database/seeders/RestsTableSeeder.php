<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rest;
use App\Models\Work;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        Rest::factory()->count(100)->create();
    }
}
