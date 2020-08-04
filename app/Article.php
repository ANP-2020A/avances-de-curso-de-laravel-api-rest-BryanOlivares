<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = ['title', 'body'];

 21-resources
    public static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = Auth::id();
        });
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
21-resources

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
