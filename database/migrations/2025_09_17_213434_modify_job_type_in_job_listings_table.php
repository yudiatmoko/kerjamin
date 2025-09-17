<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropColumn('job_type');
            $table->foreignId('job_type_id')->after('qualification')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropForeign(['job_type_id']);
            $table->dropColumn('job_type_id');
            $table->enum('job_type', ['Penuh Waktu', 'Paruh Waktu', 'Magang', 'Kontrak']);
        });
    }
};
