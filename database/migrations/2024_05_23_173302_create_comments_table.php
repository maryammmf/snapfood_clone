<?php

use App\Models\seller\Food;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('score');
            $table->foreignIdFor(Cart::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Food::class)->constrained()->onDelete('cascade');
            $table->string('response')->nullable();
            $table->string('status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
