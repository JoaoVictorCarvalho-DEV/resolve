<?php

namespace App\Policies;

use App\Models\CodeSnippet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CodeSnippetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CodeSnippet $codeSnippet): bool
    {
        return $user->id === $codeSnippet->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CodeSnippet $codeSnippet): bool
    {
        return $user->id === $codeSnippet->solution->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CodeSnippet $codeSnippet): bool
    {
        return $user->id === $codeSnippet->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CodeSnippet $codeSnippet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CodeSnippet $codeSnippet): bool
    {
        return false;
    }
}
