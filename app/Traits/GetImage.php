<?php

namespace App\Traits;

trait GetImage
{
    public function getThumbnail()
    {

        if (str_starts_with($this->thumbnail, 'https')) {
            return $this->thumbnail;
        }

        return asset('storage/' . $this->thumbnail);
    }
}
