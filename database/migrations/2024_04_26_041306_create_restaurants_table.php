<?php

use App\Models\Admin\RestaurantCategory;
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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Seller::class)->constrained();
            $table->foreignIdFor(RestaurantCategory::class)->constrained();
            $table->string('number');
            $table->string('address');
            $table->string('bank_info');
            $table->string('is_open')->nullable();
            $table->string('schedule')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
