<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;
use App\Models\User;

class Vote extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reply(){
        return $this->belongsTo(Reply::class);
    }
}
