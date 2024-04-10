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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sparepart_id')
            ->unsigned();
            $table->foreign('sparepart_id')   
            ->references('id')         
            ->on('spareparts')          
            ->onDelete('CASCADE')     
            ->onUpdate('RESTRICT')    
        ;
        $table->string('path', 191)
            ->collation('utf8mb4_0900_ai_ci')
            ->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
