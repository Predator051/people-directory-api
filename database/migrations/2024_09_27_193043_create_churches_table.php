<?php

use App\Models\Address;
use App\Models\Union;
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
        Schema::create('churches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 255);
            $table->foreignIdFor(Union::class)->constrained();
            $table->foreignIdFor(Address::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        if (!app()->isProduction()) {
            Schema::dropIfExists('churches');
        }
    }
};
