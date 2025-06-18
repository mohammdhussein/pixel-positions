<?php

namespace App\Http\Resources;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Job */
class JobResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'salary' => $this->salary,
            'location' => $this->location,
            'schedule' => $this->schedule,
            'url' => $this->url,
            'featured' => $this->featured,
        ];
    }
}
