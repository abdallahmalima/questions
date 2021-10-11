<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Reply;
use App\Models\User;
use App\Models\Dislike;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){

        return $this->hasMany(Like::class);
    }

    public function reply(){

        return $this->belongsTo(Reply::class);
    }

    public function dislikes(){

        return $this->hasMany(Dislike::class);
    }

    public function hasLike(){
        return $this->hasOne(Like::class)->whereUserId(auth()->user()->id);
    }
}
