<?php

namespace Src\Application\Usecases;

use Illuminate\Support\Facades\Log;
use Src\Domain\Repositories\PostInterfaceRepository;
use Src\Domain\ValueObjects\Status;
use Src\Infrastructure\DTos\Response\PostResponseDto;

class SharedPostUseCase
{

    public function __construct(
        private readonly PostInterfaceRepository $postRepository)
    {

    }
    public function execute(array $data)
    {
        $status = Status::fromString($data['status'] ?? 'visible');
        Log::info("datos recibidos: ", [$data]);
        $data['status'] = $status->value;
        $post = $this->postRepository->create($data);

        Log::info("creando",["creado ?:" => $post]);
        return  PostResponseDto::fromModel($post);
    }

}
