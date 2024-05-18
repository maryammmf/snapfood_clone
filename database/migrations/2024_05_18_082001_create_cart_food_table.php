<?php

use App\Models\seller\Food;
use App\Models\User\Cart;
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
        Schema::create('cart_food', function (Blueprint $table) {
            $table->foreignIdFor(Cart::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Food::class)->constrained()->cascadeOnDelete();
            $table->unique(['cart_id' , 'food_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_food');
    }
};
