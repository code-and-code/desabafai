<?php

namespace desabafai\domains\Comment;

use desabafai\domains\Denunciation\Denunciation;
use desabafai\domains\User\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body','user_id',
    ];

    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function Comments()
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

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
