<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
$table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('order_id')->constrained()->onDelete('cascade'); // food_item_id এর বদলে order_id
        $table->integer('rating'); // ১ থেকে ৫
        $table->text('comment')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
