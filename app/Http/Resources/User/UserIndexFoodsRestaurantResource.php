<?php

namespace App\Http\Resources\user;

use App\Models\Admin\FoodCategory;
use App\Models\seller\Food;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIndexFoodsRestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $foodCategory = FoodCategory::query()->where('id' , $this->food_category_id)->firstOrFail();
        $off = null;
        if ($this->discount){
            $off = [
                'label' => $this->discount['name'],
                'factor' => $this->discount['amount'],
            ];
        }

//        $showof = null;
//
//        if ($off !== NULL){
//            $showof = 'showofffff';
//
//        }


        return [
            'categories' => [
                'id' => $foodCategory->id,
                'title' => $foodCategory->name,
                'foods' => [
                    'id' => $this->id,
                    'title' => $this->name,
                    'price' => $this->price,
                    'off' => $off,
                    'row_material' => $this->material,
                    'image' => $this->photo,
                    ]
            ]
        ];

    }
}
