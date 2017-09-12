<?php

namespace desabafai\domains\Like;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Like extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id'
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

}
