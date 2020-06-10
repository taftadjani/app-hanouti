<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    protected $table = 'role_user';

    protected $fillable = [];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $hidden = ['deleted_at','created_at','updated_at'];


    /**
     * Get the Role that owns the RoleUser.
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Get the User that owns the RoleUser.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
