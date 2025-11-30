<?php

namespace Src\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Src\Application\Traits\ApiResponse;
use Src\Application\Usecases\RegisterUseCase;

final class RegisterUserController
{
    use ApiResponse;

    private $registerUserCase;

    public function __construct(
        RegisterUseCase $registerUseCase
    )
    {
          $this->registerUserCase = $registerUseCase;
    }

    public function __invoke(Request $request)
    {
     Log::info("data recibida", ["request" => $request->all()]);
        try {
            $registerUser = $request->validate([
                'name'=> ['required', 'string'],
                'username' => ['nullable', 'string'],
                'password' => ['required'],
                'email' => ['nullable', 'email'],
                'lastname' => ['nullable', 'string'],
                'nickname' => ['nullable', 'string'],
            ]);
           $result = $this->registerUserCase->execute($registerUser);
          return  $this->success($result);
        }catch (\Exception $exception){
           return  $this->error($exception->getMessage());
        }

    }



}
