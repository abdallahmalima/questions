<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Reply;
use App\Models\User;


class Question extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){

        return $this->hasMany(Reply::class);
    }

  
  
}
