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
        Schema::create('sparepart_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sparepart_id') 
            ->unsigned();
            $table->bigInteger('tag_id') 
            ->unsigned();
            $table->foreign('sparepart_id')   
            ->references('id')       
            ->on('spareparts')         
            ->onDelete('CASCADE')    
            ->onUpdate('RESTRICT');
            $table->foreign('tag_id')
            ->references('id')    
            ->on('tags')          
            ->onDelete('CASCADE') 
            ->onUpdate('RESTRICT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sparepart_tag');
    }
};
