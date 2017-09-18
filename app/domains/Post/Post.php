<?php

namespace desabafai\domains\Post;

use desabafai\domains\Comment\Comment;
use desabafai\domains\Denunciation\Denunciation;
use desabafai\domains\Like\Like;
use desabafai\domains\User\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sassnowski\LaravelShareableModel\Shareable\Shareable;
use Sassnowski\LaravelShareableModel\Shareable\ShareableInterface;

class Post extends Model implements Transformable,ShareableInterface
{
    use TransformableTrait,Shareable;

    protected $fillable = [
        'title','body','img','user_from_id','user_id', 'address','latitude','longitude',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at','DESC');
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
