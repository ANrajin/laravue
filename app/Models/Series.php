<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $guarded = [];


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
