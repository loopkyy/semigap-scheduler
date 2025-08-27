<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lectures', function (Blueprint $table) {
            // hapus kolom day
            if (Schema::hasColumn('lectures', 'day')) {
                $table->dropColumn('day');
            }

            // pastikan ada kolom date
            if (!Schema::hasColumn('lectures', 'date')) {
                $table->date('date')->after('lecturer');
            }
        });
    }

    public function down(): void
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->string('day')->nullable();
            $table->dropColumn('date');
        });
    }
};
