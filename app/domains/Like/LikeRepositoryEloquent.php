<?php

namespace desabafai\domains\Like;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use desabafai\domains\Like\LikeRepository;
use desabafai\domains\Like\Like;
use desabafai\domains\Like\LikeValidator;

/**
 * Class LikeRepositoryEloquent
 * @package namespace desabafai\domains\\Like;
 */
class LikeRepositoryEloquent extends BaseRepository implements LikeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Like::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
