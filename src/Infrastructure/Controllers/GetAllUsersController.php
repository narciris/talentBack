<?php
namespace Src\Infrasctruture\Controllers;
use App\Models\User;
use Src\Application\Traits\ApiResponse;


class GetAllUsersController {
    use ApiResponse;


    public function __invoke(){
        $users = User::all();
        return $this->success($susers);
    }
}