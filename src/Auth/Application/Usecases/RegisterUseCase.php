<?php

namespace Src\Auth\Application\Usecases;

use Illuminate\Support\Facades\Log;
use Src\Auth\Domain\Repositories\UserInterfaceRepository;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Auth\Infrastructure\DTos\Response\UserResponseDto;

class RegisterUseCase
{

     private $registerRepository;

     public function __construct(UserInterfaceRepository $userRepository)
     {
         $this->registerRepository = $userRepository;
     }

     public function execute( array $data )
     {
         //validaciones
         $username = Username::fromString($data['username']);
         $pass = Password::fromString($data['password']);

         //array data
         $userArray = [
             'name'=> $data['name'],
             'email' => $data['email'],
             'username' => $username->value(),
             'password' => $pass->value(),
             'lastname' => $data['lastname'],
             'nickname' => $data['nickname'],
             'created_at' => now(),
             'updated_at' => now()

         ];

         $saved = $this->registerRepository->create($userArray);
         Log::info("usuario guardado: ",["guardado" => $saved]);

         return UserResponseDto::fromModel($saved);

     }
}
