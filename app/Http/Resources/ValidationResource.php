<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ValidationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'work_experience' => $this->work_experience,
            'job_category' => $this->job_category,
            'job_position' => $this->job_position,
            'reason_accepted' => $this->reason_accepted,
        ];
    }
}
