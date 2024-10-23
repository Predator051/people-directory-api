<?php

use App\Models\Attribute;
use App\Models\People;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attribute_value_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('value');
            $table->foreignIdFor(Attribute::class)->constrained();
            $table->foreignIdFor(People::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('attribute_value_histories');
        }
    }
};
