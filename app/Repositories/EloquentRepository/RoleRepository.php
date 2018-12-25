<?php
namespace App\Repositories\EloquentRepository;

use App\Models\Role;
use App\Repositories\EloquentRepository;
use App\Repositories\InterfaceRepository\RoleRepositoryInterface;

class RoleRepository extends EloquentRepository implements RoleRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Role::class;
    }
}
