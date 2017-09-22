<?php

namespace desabafai\domains\Post;

use desabafai\domains\Comment\Comment;
use desabafai\domains\Denunciation\Denunciation;
use desabafai\domains\Like\Like;
use desabafai\domains\Post\Events\PostCreate;
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

    
    protected $dispatchesEvents = [
        'saved' => PostCreate::class,
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    //delete Cascade
    function delete()
    {
        $this->Comments()->delete();
        $this->Denunciations()->delete();
        $this->Likes()->delete();
        parent::delete();
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

    public function setBodyAttribute($value)
    {
        $values = explode(';',$value);
        $str = null;
        foreach ($values as $value)
        {
            switch ($value) {
                case str_contains($value, 'link:'):
                    $str =  $str. str_replace('link:',''," <a href='{$value}'target='_blank' >{$value}</a><br>");
                    break;
                case str_contains($value, 'img:'):
                    $str = $str.str_replace('img:',''," <img src='{$value}' width='50%' height='50%'><br>");
                    break;
                default:
                    $str = $str.$value."<br>";
            }
        }
        $this->attributes['body'] = $str;
    }

}
