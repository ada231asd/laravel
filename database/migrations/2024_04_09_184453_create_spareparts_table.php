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
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55)
            ->collation('utf8mb4_0900_ai_ci')
            ->unique();
            $table->decimal('price', 7, 2)
            ->index();
            $table->text('description')
            ->collation('utf8mb4_0900_ai_ci');
            $table->integer('quantity')
            ->default(0);
            $table->boolean('available')
            ->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spareparts');
    }
};
