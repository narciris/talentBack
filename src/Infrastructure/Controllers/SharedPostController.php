<?php

namespace Src\Infrastructure\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Src\Application\Traits\ApiResponse;
use Src\Application\Usecases\SharedPostUseCase;

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
            Log::info("entrando al metodo sharedPosst");
            //   Gate::authorize('create',Post::class);
            $post = $request->validate(
                [
                    'title' => ['required', 'string'],
                    'content' => ['required','string'],
                    'status' => ['nullable','string'],
                ]
            );
            $post['user_id'] = auth()->user()->id;
//            Log::info("info: ",[$post] );
          $result = $sharedPostUseCase->execute($post);
                   return $this->success( $result->toArray(),"post creado exitosamente");
        }catch (\Exception $exception){
          return $this->error($exception->getMessage());
        }
    }
}
