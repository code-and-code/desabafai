<?php

namespace desabafai\domains\Denunciation\Services;

use desabafai\domains\User\User;

class DenunciationService
{
    public function store(User $user, $model)
     {
         if(method_exists($model,'Denunciations')){

             if(!$model->Denunciations()->whereUserId($user->id)->first())
             {
                 return $model->Denunciations()->create(['user_id' => $user->id]);
             }
             {
                 return false;
             }
         }
         throw new \Exception('There is no relationship, Denunciation');
     }

}
