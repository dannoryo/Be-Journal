<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PostController;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use App\Models\posts;


class Post extends Model
{
    protected $fillable = ['title'];
    use HasFactory;
    // protected $fillable = [
    //     'comment',
    //     'user_id',
    //     'post_id',
    //     'img_at',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
}




