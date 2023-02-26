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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->foreignId('address_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('phone_number', 20);
            $table->string('referred_via', 60);
            $table->boolean('opt_in_marketing')->default(false);
            $table->boolean('accepted_terms_and_conditions')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
