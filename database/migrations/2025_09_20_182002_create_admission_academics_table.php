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
        Schema::create('admission_academics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->cascadeOnDelete();
            $table->integer('lrn');
            // jr
            $table->string('jr_school');
            $table->foreignId('jr_strand_id')->nullable()->constrained('strand_id')->nullOnDelete();
            $table->string('jr_year_graduated');
            $table->decimal('jr_gwa_first', 3, 2);
            $table->decimal('jr_gwa_second', 3, 2);
            // senior
            $table->string('sr_school');
            $table->foreignId('sr_strand_id')->nullable()->constrained('strand_id')->nullOnDelete();
            $table->string('sr_year_graduated');
            $table->decimal('sr_gwa_first', 3, 2);
            $table->decimal('sr_gwa_second', 3, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_academics');
    }
};