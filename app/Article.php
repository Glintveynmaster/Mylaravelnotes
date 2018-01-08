<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'notes';
    protected $primaryKey ='id';
    protected $fillable = [
        'title', 'text', 'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function img(){
        return $this->hasMany('App\Image');
    }
    
}
