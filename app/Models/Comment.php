<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $fillable = [
        'solution_id',
        'user_id',
        'comment'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function solution(){
        return $this->belongsTo(Solution::class);
    }

}

