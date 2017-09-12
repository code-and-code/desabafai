<?php

namespace desabafai\domains\Post;

use League\Fractal\TransformerAbstract;
use desabafai\domains\Post\Post;

/**
 * Class PostTransformer
 * @package namespace desabafai\domains\Post;
 */
class PostTransformer extends TransformerAbstract
{

    /**
     * Transform the \Post entity
     * @param \Post $model
     *
     * @return array
     */
    public function transform(Post $model)
    {
        return [
            'id' => (int)$model->id,
            'created_at' => $model->created_at->format('d-m-Y h:i:s'),
            'updated_at' => $model->updated_at->format('d-m-Y h:i:s'),
        ];
    }
}
