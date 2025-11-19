<?php

namespace Src\Auth\Infrastructure\EloquentRepositories;

use App\Models\Post;
use Src\Auth\Domain\Repositories\PostInterfaceRepository;

class EloquentPostRepositoryImpl implements PostInterfaceRepository
{

    public function create(array $data)
    {
       return Post::create($data);
    }
}
