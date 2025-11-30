<?php

namespace Src\Infrastructure\EloquentRepositories;

use App\Models\Post;
use Src\Domain\Repositories\PostInterfaceRepository;

class EloquentPostRepositoryImpl implements PostInterfaceRepository
{

    public function create(array $data)
    {
       return Post::create($data);
    }
}
