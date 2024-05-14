<?php

namespace App\Http\Resources\user;

use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIndexCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $restaurant = Restaurant::query()->where('id' , $this->restaurant_id)->firstOrFail();
        $food = Food::query()->where('id' , $this->food_id)->firstOrFail();
        return [
            'carts' => [
                'id' => $this->id,
                'restauurant' => [
                    'title' => $restaurant->name,
                    'image' => $restaurant->photo,
                ],
                'foods' => [
                    'id' => $food->id,
                    'title' => $food->name,
                    'count' => $this->count,
                    'price' => $food->price,
                ],
                'created_at' => $this->created_at->format('Y-m-d'),
                'updated_at' => $this->updated_at->format('Y-m-d'),

            ]
        ];
    }
}
