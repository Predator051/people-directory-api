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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('country', 255);
            $table->string('region', 255);
            $table->string('city', 255);
            $table->string('street', 255);
            $table->string('house', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        if (!app()->isProduction()) {
            Schema::dropIfExists('addresses');
        }
    }
};
