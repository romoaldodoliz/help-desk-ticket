<?php

namespace App\Repository;
use App\Models\Models\ModelUser;

class UsersRepository 
{   
    protected $userModelObj;

    function __construct()
    {
        $this->userModelObj = new ModelUser;
    }

    public function createUser($data)
    {
        return $this->userModelObj::create($data);
    }

    public function getUser($id)
    {
        return $this->userModelObj->where('id', $id)->first();
    }

    public function updateUser($data, $id)
    {
        return $this->userModelObj->where('id', $id)->update($data);
    }
}