<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Models\Series;
use Illuminate\Validation\Rule;

class CreateSeriesRequest extends FormRequest
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
            'description' => 'required',
            'image' => 'required|image|dimensions:min_width=100,min_height=200'
        ];
    }


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


    /**
     * Store the 
     */
    public function storeSeries()
    {
        $series = Series::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'img_url' => 'series/' . $this->fileName,
            'description' => $this->description
        ]);

        session()->flash('Success', 'Series created successfully.');

        return redirect()->route('admin.series.show', $series->slug);
    }
}
