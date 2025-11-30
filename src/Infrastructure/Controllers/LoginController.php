<?php

namespace Src\Infrastructure\Controllers;
use Illuminate\Http\Request;
use Src\Application\Traits\ApiResponse;
use Src\Application\Usecases\LoginUsecase;
use Src\Domain\ValueObjects\Password;
use Src\Domain\ValueObjects\Username;


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
