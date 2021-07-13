<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['value', 'standard'];

    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
