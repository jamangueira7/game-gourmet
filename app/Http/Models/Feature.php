<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['value', 'food_id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
