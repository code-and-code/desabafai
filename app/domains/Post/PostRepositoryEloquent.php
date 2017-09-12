<?php

namespace desabafai\domains\Post;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use desabafai\domains\Post\PostRepository;
use desabafai\domains\Post\Post;
use desabafai\domains\Post\PostValidator;

/**
 * Class PostRepositoryEloquent
 * @package namespace desabafai\\\Post;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{


    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    protected $fieldSearchable = [
        'title',
        'body',
        'product.name'
    ];

        /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return PostPresenter::class;
    }
}
