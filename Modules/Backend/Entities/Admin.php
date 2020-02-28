<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admin';
    //config/auth/
    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password', 'password_confirmation', 'avatar', 'background'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('Modules\Backend\Entities\Roles');
    }
}
