<?php

namespace App\Http\Resources\User;

use App\Models\Admin\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowRestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $type = RestaurantCategory::query()->where('id' , $this->restaurant_category_id)->firstOrFail();

        return [
            'id'=> $this->id,
            'title'=>$this->name,
            'type'=>$type->name,
            'address'=>[
                'addreess'=>$this->address,
                'latitude'=>$this->latitude,
                'longitude'=>$this->longitude,
            ],
            'is_open'=>$this->is_open,
            'image'=>secure_asset($this->photo),
            'score'=>4.5,
            'comments_count'=>23,
            'schedule' =>$this->schedule,
        ];
    }
}
