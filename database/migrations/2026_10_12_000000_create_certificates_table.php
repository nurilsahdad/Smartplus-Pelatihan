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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('enrollment_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('certificate_number')->unique();
            $table->string('verification_code', 64)->unique();
            $table->string('program_name');
            $table->string('program_slug')->nullable();
            $table->date('issue_date');
            $table->string('predicate')->default('Kompeten / Sangat Memuaskan');
            $table->string('signed_by')->default('Direktur CV. SMARTPLUS INDONESIA');
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
