<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function view(User $user, admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
   public function create(admin $user)
    {
         return $this->getPermission($user,5);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function update(User $user, admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function delete(User $user, admin $admin)
    {
        //
    }
         protected function getPermission($user,$p_id)
    {
       
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
}
