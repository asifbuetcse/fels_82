<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'category_name'];
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
    public function answers()
    {
        return $this->hasManyThrough('App\Answer', 'App\Question');
    }
    public function learnedwords()
    {
        return $this->hasMany('App\Learnedword');
    }
    public function lessonbase()
    {
        return $this->hasManyThrough('App\Lessonbase', 'App\Question');
    }
    public static function boot()
    {
        parent::boot();
        static::deleting(function($category)
        {
            $category->questions()->delete();
            $category->lessons()->delete();
        });
    }
}
