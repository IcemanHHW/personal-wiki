<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can view any pages.
     */
    public function viewAny(User $user): bool
    {
        // Users can view their own pages
        return true;
    }

    /**
     * Determine if the user can view the given page.
     */
    public function view(User $user, Page $page): bool
    {
        return true;
    }

    /**
     * Determine if the user can create a page.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine if the user can update the given page.
     */
    public function update(User $user, Page $page): bool
    {
        return $user->id === $page->user_id;
    }

    /**
     * Determine if the user can delete the given page.
     */
    public function delete(User $user, Page $page): bool
    {
        return $user->id === $page->user_id;
    }
}

