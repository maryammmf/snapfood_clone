<?php

use App\Models\Admin\FoodCategory;
use App\Models\seller\Food;
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
        Schema::create('food_food_category', function (Blueprint $table) {
            $table->foreignIdFor(Food::class)->constrained()->onDelete('CASCADE');
            $table->foreignIdFor(FoodCategory::class)->constrained()->onDelete('CASCADE');
            $table->unique(['food_id' , 'food_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_food_category');
    }
};
