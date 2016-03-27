<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Authenticatable
{
    protected $table = 'admin_users';

    protected $fillable = [
        'username', 'fullname', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Encript user's password.
     * 
     * @param string $value;
     */
    protected function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * A user can have many roles.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'adminuser_role', 'adminuser_id', 'role_id')
                    ->withTimestamps();
    }
}
