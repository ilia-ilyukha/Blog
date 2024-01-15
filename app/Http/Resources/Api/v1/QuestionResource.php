<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'question' => $this->question,
            'answer' => $this->answer,
            'tag' => $this->tag,
            'variants' => json_decode($this->variants),
        ];

        // id    
        // status
        // title 
        // question 
        // answer 
        // tag 
        // created_at 
        // updated_at
    }
}
