<?php

namespace Src\Auth\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Src\Auth\Application\Traits\ApiResponse;
use Src\Auth\Application\Usecases\SharedPostUseCase;

class SharedPostController
{
    use ApiResponse;
    public function __construct(private readonly SharedPostUseCase
                                $sharedPostUseCase)
    {

    }

    public function __invoke(Request $request,
                             SharedPostUseCase $sharedPostUseCase)
    {
        try {

            $post = $request->validate(
                [
                    'title' => ['required', 'string'],
                    'content' => ['required','string'],
                    'status' => ['nullable','string'],
                ]
            );
            $post['user_id'] = auth()->id();
//            Log::info("info: ",[$post] );
          $result = $sharedPostUseCase->execute($post);
                   return $this->success( $result->toArray(),"post creado exitosamente");
        }catch (\Exception $exception){
          return $this->error($exception->getMessage());
        }
    }
}
