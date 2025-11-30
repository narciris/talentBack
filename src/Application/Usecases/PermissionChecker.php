<?php

namespace Src\Application\Usecases;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Src\Domain\Repositories\PermissionRepositoryInterface;
use Src\Domain\Repositories\UserInterfaceRepository;
use Src\Domain\Repositories\UserRepositoryInterface;

class PermissionChecker
{
    public function __construct(
        private readonly UserInterfaceRepository $userRepository,
        private readonly  PermissionRepositoryInterface $permissionRepository
    )
    {

    }

   public function userHasPermission(int $userId,
                                     string $permission): bool
   {
       $user = $this->userRepository->findById($userId);
       if(!$user){
          return  false;
       }
       $override  = $this->permissionRepository->findByUserId( $userId,$permission);

       if( $override && $override->revoked === false){
           return true;
       }

       if( $override && $override->revoked === true){
           return false;
       }

       return $user->can($permission);
   }

}
