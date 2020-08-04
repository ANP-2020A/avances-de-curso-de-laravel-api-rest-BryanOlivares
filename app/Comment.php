<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = ['text'];



class Comment extends Model
{
    protected $fillable = ['text'];
 21-resources
    public static function boot()
    {
        parent::boot();
        static::creating(function ($comment) {
            $comment->user_id = Auth::id();
        });
    }
 21-resources

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
