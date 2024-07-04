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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('description');
            $table->string('image');
            $table->integer('price');
            $table->foreignId('type_id')
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreignId('breed_id')
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->boolean('is_sold')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};