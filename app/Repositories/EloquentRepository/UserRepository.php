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

    public function load($method)
    {
        return $this->_model::all()->load($method);
    }

    public function ImageUpdate($data = null) 
    {
        $avatarBase64 = explode(',', $data);
        $file = $avatarBase64[1];
        $validaFile = explode('/', $file);
        $imageName = str_random(4).'.'.$validaFile[1];
        file_put_contents(storage_path().config('site.user.base64').$imageName, base64_decode($file));

        return $imageName;
    }
}
