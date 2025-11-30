<?php

namespace Src\Infrastructure\EloquentRepositories;

use App\Models\User;
use Src\Domain\Repositories\UserInterfaceRepository;
use Src\Domain\ValueObjects\Username;

class EloquentUserRepository implements UserInterfaceRepository
{

    public function finByUsername(Username $username)
    {
        return User::where('username',$username)->first();
    }


    public function create(array $data){
        return User::create($data);
    }

    public function findById(int $id)
    {
       return User::findOrFail($id);
    }
}
