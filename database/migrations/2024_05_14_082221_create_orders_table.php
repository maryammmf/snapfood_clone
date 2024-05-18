<?php

use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
use App\Models\User\Cart;
use App\Models\User\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cart::class)->constrained();
            $table->foreignIdFor(Restaurant::class)->constrained();
            $table->foreignIdFor(Seller::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('price');
            $table->string('status')->default('در حال بررسی');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
