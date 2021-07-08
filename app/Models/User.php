<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;

use App\Models\House; 

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_ROLE = 0;
    const USER_ROLE = 1; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function full_name()
    {
        if (!empty($this->last_name)) {
            return ucfirst($this->first_name) . ' ' . $this->last_name;
        } else {
            return ucfirst($this->first_name);
        }
    }

    public function houses()
    {
        return $this->hasMany(House::class); 
    }
    
    /**
     * Check user for administrator role
     */
    public function isAdmin()
    {
        return $this->role == self::ADMIN_ROLE;
    }

}
