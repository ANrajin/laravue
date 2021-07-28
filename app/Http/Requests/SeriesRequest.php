<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SeriesRequest extends FormRequest
{
    /**
     * Store the uploaded file
     */
    public function uploadSeriesImage()
    {
        $image = $this->file('image');
        $this->fileName = Str::slug($this->title) . '.' . $image->getClientOriginalExtension();

        //check if directory exist or not
        if (!Storage::exists("public/series")) {
            Storage::makeDirectory("public/series");
        }

        Storage::putFileAs('public/series', $image, $this->fileName);

        return $this;
    }
}
