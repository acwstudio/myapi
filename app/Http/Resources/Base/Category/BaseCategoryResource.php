<?php

namespace App\Http\Resources\Base\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => 'categories',
            'slug' => $this->slug,
            'attributes' => [
                'name' => $this->name,
                'published' => $this->published,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'products' => [
                    'links' => [
//                        'self' => route('answers.relationships.question', ['answer' => $this->id]),
//                        'related' => route('answers.question', ['answer' => $this->id])
                    ],
//                    'data' => new AdminQuestionResource($this->whenLoaded('question'))
                ]
            ]
        ];
    }
}
