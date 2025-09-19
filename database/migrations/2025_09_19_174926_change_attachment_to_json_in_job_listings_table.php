<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        DB::statement('ALTER TABLE job_listings ALTER COLUMN attachment TYPE JSON USING (attachment::JSON)');
    }

    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->string('attachment')->nullable()->change();
        });
    }
};


