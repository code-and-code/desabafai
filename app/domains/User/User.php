<?php

namespace desabafai\domains\User;

use desabafai\domains\Post\Post;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait, HasApiTokens, Notifiable;

    protected $fillable = [
        'nickname','email','term_use','password','avatar',
    ];

    protected $hidden = [
        'password', 'remember_token','email',
    ];

    public function Posts()
    {
        return $this->hasMany(Post::class);
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
