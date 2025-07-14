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
        Schema::table('grades', function (Blueprint $table) {
            //
            $table->foreignId('student_id')->nullable()->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subject_id')->nullable()->constrained('subjects')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('grade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            //
            $table->dropForeign(['student_id']);
            $table->dropForeign(['subject_id']);
            $table->dropColumn('student_id');
            $table->dropColumn('subject_id');
            $table->dropColumn('grade');
        });
    }
};
