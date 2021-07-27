<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateSeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required'
        ];
    }

    public function updateSeriesImage()
    {
        $uploaded = $this->image;
        $this->fileName = Str::slug($this->title) . '.' . $uploaded->getClientOriginalExtension();
        $uploaded->storePubliclyAs('series', $this->fileName);

        return $this;
    }
}
