<?php

use App\Http\Controllers\Admin\AdminFoodCategoryController;
use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('material')->nullable();
            $table->string('price');
            $table->string('photo')->nullable();
            $table->foreignIdFor(FoodCategory::class)->constrained();
            $table->foreignIdFor(Discount::class)->nullable()->constrained();
            $table->foreignIdFor(Seller::class)->nullable()->constrained();
            $table->foreignIdFor(Restaurant::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
