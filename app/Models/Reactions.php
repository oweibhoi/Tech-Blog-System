<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactions extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'reaction', 'user_id'];


    public function posts()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }

    public function reactor(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
