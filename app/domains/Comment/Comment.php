<?php

namespace desabafai\domains\Comment;

use desabafai\domains\Denunciation\Denunciation;
use desabafai\domains\Like\Like;
use desabafai\domains\User\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body','user_id'
    ];

    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
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

    public function setBodyAttribute($value)
    {
        $values = explode(';',$value);
        if(is_array($values))
        {
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

            return $this->attributes['body'] = $str;
        }
        return $this->attributes['body'] = $value;
    }

    public function getBody(Int $int){

        return chunk_split($this->body, $int);

    }

}
