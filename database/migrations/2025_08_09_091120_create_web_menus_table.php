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
        Schema::create('web_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('icon', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('type', 50);
            $table->integer('sort')->default(0);
            $table->unsignedBigInteger('under')->nullable();
            $table->boolean('target_blank')->default(false);
            $table->timestamps();

            $table->foreign('under')
              ->references('id')
              ->on('web_menus')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_menus');
    }
};
