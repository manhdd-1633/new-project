<?php
namespace App\Repositories\InterfaceRepository;

interface UserRepositoryInterface
{
    public function load($method);

    public function ImageUpdate($data);
}
