<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('utbk_sessions', function (Blueprint $table) {
        $table->date('date')->after('subject');
        $table->dropColumn('day'); // kalau sebelumnya sudah ada "day"
    });
}

public function down()
{
    Schema::table('utbk_sessions', function (Blueprint $table) {
        $table->string('day')->after('subject');
        $table->dropColumn('date');
    });
}

};
