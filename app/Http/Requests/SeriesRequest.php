<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SeriesRequest extends FormRequest
{
    /**
     * Store the uploaded file
     */
    public function uploadSeriesImage()
    {
        $uploaded = $this->image;
        $this->fileName = Str::slug($this->title) . '.' . $uploaded->getClientOriginalExtension();
        $uploaded->storePubliclyAs('series', $this->fileName);

        return $this;
    }
}
