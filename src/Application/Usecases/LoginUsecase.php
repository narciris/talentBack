<?php

namespace Src\Application\Usecases;

use Illuminate\Support\Facades\Auth;
use Src\Domain\Repositories\UserInterfaceRepository;
use Src\Domain\ValueObjects\Password;
use Src\Domain\ValueObjects\Username;
use Src\Infrastructure\DTos\Response\UserResponseDto;

class LoginUsecase
{
   private $userRepository;
    public function __construct(UserInterfaceRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function execute(
        Username $username,
        Password $password
    )
    {
        $userModel = $this->userRepository->finByUsername($username);
      if(!$userModel){
          throw new \InvalidArgumentException("Credenciales incorrectas");
      }

//      $pass = Hash::make($password);
      if(!Auth::attempt(['username'=> $username, 'password'=> $password])){
          throw new \InvalidArgumentException("Credenciales incorrectas");
      }

      //devolver usuario
        $token = $userModel->createToken('api-token')->plainTextToken;

        $user = UserResponseDto::fromModel($userModel);
       return [
           'token'=>$token,
           'user'=> $user->toArray()
       ];

    }

}
