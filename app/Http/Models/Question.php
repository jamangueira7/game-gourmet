<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['food', 'type', 'detail'];
}
