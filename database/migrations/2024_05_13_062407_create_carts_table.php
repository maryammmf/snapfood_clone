<?php

use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Food::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Seller::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Restaurant::class)->constrained()->onDelete('cascade');
            $table->string('count');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
