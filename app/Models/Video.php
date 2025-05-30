<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'description',
        'solution_id'
    ];

    public function solution(){
        return $this->belongsTo(Solution::class);
    }
}
