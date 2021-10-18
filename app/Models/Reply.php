<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Vote;
use App\Models\Question;

class Reply extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function image(){
        
        return $this->morphOne(Image::class,'imageable');
    }


}
