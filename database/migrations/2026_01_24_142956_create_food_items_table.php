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
        Schema::create('food_items', function (Blueprint $table) {
         $table->id();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
        $table->string('item_name');
        $table->string('item_slug');
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->string('image')->nullable();
        $table->integer('status')->default(1); // 1 = Active, 0 = Inactive
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_items');
    }
};
