<?php

namespace App\Http\Resources;

use App\Models\seller\Food;
use App\Models\User\Cart;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class CommentIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $foodName = Food::query()->where('id' , $this->food_id)->pluck('name');
        $userName = User::query()->where('id' , $this->user_id)->pluck('name')->first();
        $respnse = $this->response;
        $result = [];
        $result[] = [
            'author' => ['name'=>$userName],
            'foods' => $foodName,
            'created_at' => $this->created_at->format('y-m-d'),
            'score'=>$this->score,
            'cotent'=>$this->message,
        ];
        if (!is_null($respnse)){
            $result['response'] = $respnse;
        }
        return $result;
    }

}
