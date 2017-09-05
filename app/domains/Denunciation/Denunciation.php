<?php

namespace desabafai\domains\Denunciation;

use Illuminate\Database\Eloquent\Model;

class Denunciation extends Model
{
    public function denunciationble()
    {
        return $this->morphTo();
    }
}
