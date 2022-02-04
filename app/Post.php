<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable= [
        'title',
        'subtitle',
        'author',
        'content',
        'relase_date',
    ];
}