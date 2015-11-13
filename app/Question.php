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
        return $this->belongsTo('App\Question');
    }
    public function lessonbases()
    {
        return $this->hasOne('App\Lessonbase');
    }
}
