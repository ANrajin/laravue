<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['Lessons'];


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /**
     * Overwrite
     * Get the route key for the model.
     *
     * @return slug string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
