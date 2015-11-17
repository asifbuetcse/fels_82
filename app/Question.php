<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function lessonbase()
    {
        return $this->hasOne('App\Lessonbase');
    }
    public function learnedwords(){
        return $this->hasMany('App\Learnedword');
    }
    public static function boot()
    {
        parent::boot();
        static::deleting(function($question)
        {
            $question->answers()->delete();
            $question->learnedwords()->delete();
            $question->lessonbase()->delete();
        });
    }
}
