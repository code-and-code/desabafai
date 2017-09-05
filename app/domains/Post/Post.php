<?php

namespace desabafai\domains\Post;

use desabafai\domains\Comment\Comment;
use desabafai\domains\Denunciation\Denunciation;
use desabafai\domains\Like\Like;
use desabafai\domains\User\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','body','img','user_from_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function Denunciations()
    {
        return $this->morphMany(Denunciation::class, 'denunciationable');
    }

    public function Likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

}
