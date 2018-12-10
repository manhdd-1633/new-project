<?php
namespace App\Repositories\EloquentRepository;

use App\Models\User;
use App\Repositories\EloquentRepository;
use App\Repositories\InterfaceRepository\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }
}