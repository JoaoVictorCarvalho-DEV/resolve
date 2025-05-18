<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
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
