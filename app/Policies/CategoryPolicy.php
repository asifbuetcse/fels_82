<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function edit()
    {
        return \Auth::user()->is_admin;
    }
}
