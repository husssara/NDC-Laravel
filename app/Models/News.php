<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table ="news";
    protected $fillable=[ 
        'title',
        'details',
        'category_id',
        'summary',
        'published',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
