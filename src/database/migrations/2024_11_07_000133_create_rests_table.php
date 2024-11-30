<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestsTable extends Migration
{
    public function up()
    {
        Schema::create('rests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_id')->constrained()->onDelete('cascade');
            $table->timestamp('rest_start')->nullable();
            $table->timestamp('rest_end')->nullable();
            $table->timestamp('rest_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rests');
    }
}
