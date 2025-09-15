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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('qualification');
            $table->enum('job_type', ['Penuh Waktu', 'Paruh Waktu', 'Magang']);
            $table->string('location');
            $table->date('deadline')->nullable();
            $table->string('application_link');
            $table->string('attachment')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('views_count')->default(0);

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('education_id')->constrained('educations')->cascadeOnDelete();
            $table->foreignId('experience_level_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
