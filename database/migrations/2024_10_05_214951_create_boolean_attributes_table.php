<?php

use App\Models\Attribute;
use App\Models\People;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boolean_attributes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Attribute::class);
            $table->foreignIdFor(People::class)->constrained();
            $table->boolean('value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('boolean_attributes');
        }
    }
};