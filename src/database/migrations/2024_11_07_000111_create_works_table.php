<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('rest_id')->nullable(false);
            $table->timestamp('work_start')->nullable();
            $table->timestamp('work_end')->nullable();
            $table->timestamp('total_work')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('works');
    }
}
