<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRestIdNullableInWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->string('rest_id')->nullable()->change();
        });

    }


    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->string('rest_id')->nullable(false);
        });
    }
}
