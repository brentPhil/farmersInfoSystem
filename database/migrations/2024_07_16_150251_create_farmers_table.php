<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('enrollment');
            $table->string('reference');
            $table->string('profile')->nullable();
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('extension_name')->nullable(); // Make this nullable
            $table->string('sex');
            $table->string('building_no')->nullable(); // Made this nullable too
            $table->string('street');
            $table->foreignId('barangays_id')->constrained('barangays')->onDelete('cascade');
            $table->string('municipality'); 
            $table->string('province');
            $table->string('region');
            $table->string('contact_number');
            $table->date('date_birth');
            $table->string('place_birth');
            $table->string('religion');
            $table->string('civil_status');
            $table->string('name_spouse')->nullable(); // Made this nullable
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
