<?php
namespace desabafai\domains\User\Services;

use desabafai\domains\User\User;
use desabafai\domains\User\UserRepository;

class UserService {

    private $repository;

    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function update(array $data, $id){
        return $this->repository->update($data, $id);
    }

}