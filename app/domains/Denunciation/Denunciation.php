<?php

namespace desabafai\domains\Denunciation;

use desabafai\domains\Denunciation\Events\DenunciationCreate;
use Illuminate\Database\Eloquent\Model;

class Denunciation extends Model
{
    protected $fillable = [
        'user_id'
    ];

    protected $dispatchesEvents = [
        'saved' => DenunciationCreate::class,
    ];

    public function denunciationable()
    {
        return $this->morphTo();
    }
}
