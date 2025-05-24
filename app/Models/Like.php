<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    /** @use HasFactory<\Database\Factories\LikeFactory> */
    use HasFactory;

    protected $fillable =  [
        'user_id',
        'solution_id',
    ];

    public function solution(){
        return $this->belongsTo(Solution::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
