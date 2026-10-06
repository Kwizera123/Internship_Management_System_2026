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
        Schema::create('fee_configurations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fee_type_id')
                ->constrained('fee_types');

            $table->foreignId('institution_id')
                ->constrained('institutions');
            
            $table->foreignId('academic_year_id')
                ->constrained('academic_years');

            $table->unsignedBigInteger('amount');

            $table->boolean('is_mandatory')->default(true);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_configurations');
    }
};
