<?php

namespace Src\Auth\Infrastructure\Controllers;
use Illuminate\Http\Request;
use Src\Auth\Application\Traits\ApiResponse;
use Src\Auth\Application\Usecases\LoginUsecase;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;


final class LoginController
{
    use ApiResponse;
    private $loginUseCase;
    public function __construct(LoginUsecase $loginUseCase)
    {
        $this->loginUseCase = $loginUseCase;
    }
  public function __invoke(Request $resquest)
  {
      try {
          $username =  Username::fromString($resquest->input('username'));
          $password = Password::fromString($resquest->input('password'));

          $result = $this->loginUseCase->execute(
              $username,
              $password
          );
          return $this->success($result);
      }catch (\Exception $exception){
          return $this->error($exception->getMessage());
      }

  }

}
