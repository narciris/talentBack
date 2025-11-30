<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Src\Application\Usecases\PermissionChecker;

class PermissionPostPolicy
{

    public function __construct(private readonly PermissionChecker $permissionChecker)
    {

    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->permissionChecker->userHasPermission($user->id,'post.all');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return  $this->permissionChecker->userHasPermission($user->id,'post.show');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $this->permissionChecker->userHasPermission($user->id,'post.create')
        ? Response::allow()
        : Response::deny('No tienes permiso para crear posts.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $this->permissionChecker->userHasPermission($user->id,'post.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $this->permissionChecker->userHasPermission($user->id,'post.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return $this->permissionChecker->userHasPermission($user->id,'post.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false;
    }
}
