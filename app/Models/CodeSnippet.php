<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeSnippet extends Model
{
    /** @use HasFactory<\Database\Factories\CodeSnippetFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'solution_id'
    ];


    public function solution(){
        return $this->belongsTo(Solution::class);
    }
}

