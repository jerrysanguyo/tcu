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
            $table->string('jr_school');
            $table->foreignId('jr_strand')->nullable()->constrained('strands')->nullOnDelete();
            $table->unsignedDecimal('jr_gwa', 3, 2);
            $table->string('sr_school');
            $table->foreignId('sr_strand')->nullable()->constrained('strands')->nullOnDelete();
            $table->unsignedDecimal('jr_gwa', 3, 2);
            $table->timestamps();

            $table->check('jr_gwa BETWEEN 1.00 AND 5.00');
            $table->check('sr_gwa BETWEEN 1.00 AND 5.00');
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
