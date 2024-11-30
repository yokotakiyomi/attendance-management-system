<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTotalWorkColumnInWorksTable extends Migration
{
    public function up()
{
    Schema::table('works', function (Blueprint $table) {
        $table->time('total_work')->change();
    });
}

public function down()
{
    Schema::table('works', function (Blueprint $table) {
        $table->timestamp('total_work')->nullable()->change();
    });
}
}