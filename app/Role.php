<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * A role can have many backend users.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function adminUsers()
    {
        return $this->belongsToMany('App\AdminUser', 'adminuser_role', 'role_id', 'adminuser_id')
        			->withTimestamps();
    }
}
