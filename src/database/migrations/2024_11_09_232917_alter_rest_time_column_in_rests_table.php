<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRestTimeColumnInRestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rests', function (Blueprint $table) {
            $table->time('rest_time')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('rests', function (Blueprint $table) {
            $table->timestamp('rest_time')->nullable()->change();
        });
    }
}
