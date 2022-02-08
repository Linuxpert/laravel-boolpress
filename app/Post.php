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

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }
}
