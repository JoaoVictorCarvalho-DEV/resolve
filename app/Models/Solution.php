<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    //Aparentemente isso aqui nem sequer é necessário, só pra IDE
    /** @use HasFactory<\Database\Factories\SolutionFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

    public function codeSnippets(){
        return $this->hasMany(CodeSnippet::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

}
