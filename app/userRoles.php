<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_type', 'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'user_assinged_roles')->withTimestamps();
    }

}
