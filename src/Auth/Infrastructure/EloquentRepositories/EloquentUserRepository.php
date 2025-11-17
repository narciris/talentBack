<?php

namespace Src\Auth\Infrastructure\EloquentRepositories;

use App\Models\User;
use Src\Auth\Domain\Repositories\UserInterfaceRepository;
use Src\Auth\Domain\ValueObjects\Username;

class EloquentUserRepository implements UserInterfaceRepository
{

    public function finByUsername(Username $username)
    {
        return User::where('username',$username)->first();
    }


    public function create(array $data){
        return User::create($data);
    }
}
