<?php

namespace Glucide;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    protected $fillable = ['name', 'slug', 'category_id', 'weight', 'sugar'];
}
