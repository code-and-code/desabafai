<?php

namespace desabafai\domains\Denunciation;

use Illuminate\Database\Eloquent\Model;

class Denunciation extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function denunciationble()
    {
        return $this->morphTo();
    }
}
