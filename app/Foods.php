<?php

namespace Glucide;

use Gbrock\Table\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    protected $fillable = ['name', 'slug', 'category_id', 'weight', 'sugar'];

    use Sortable;
    /**
     * The attributes which may be used for sorting dynamically.
     *
     * @var array
     */
    protected $sortable = ['name', 'category_id', 'weight', 'sugar'];
}
