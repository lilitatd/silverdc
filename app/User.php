<?php

namespace SilverDC;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;

    public function roles() {
        return $this->belongsToMany('SilverDC\Role');
    }

    public function hasRole($role) {        
        Log::info("$role: ".$role." - user.role: ".$this->role);
        if ($this->role == $role) {
            return true;
        }
        return false;
    }

    public function authorizeRoles ($roles) {
        //$strRoles = serialize($roles);
        
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no esta autorizada');
    }

    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                Log::info($role);
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
