<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //adding new columns to the students table
            $table->date('DOB')->nullable()->after('age');
            $table->enum('gender', ['m', 'f', 'o'])->default('o')->after('DOB');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
            $table->dropColumn('DOB');
            $table->dropColumn('gender');
        });
    }
};
