<?php

namespace desabafai\domains\User;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use desabafai\domains\User\UserRepository;
use desabafai\domains\User\User;
use desabafai\domains\User\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace desabafai\domains\User;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
