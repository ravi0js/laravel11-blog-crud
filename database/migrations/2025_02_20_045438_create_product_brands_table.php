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
        Schema::create('product_brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('brand_icon')->nullable();
            $table->string('banner')->nullable();
            $table->string('background_color')->nullable();
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_brands');
    }
};
