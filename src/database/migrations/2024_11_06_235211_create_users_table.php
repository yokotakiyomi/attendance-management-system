<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->timestamp('password_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->whereNull('password_verified_at')->update(['password_verified_at' => Carbon::now()]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
