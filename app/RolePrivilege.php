<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePrivilege extends Pivot
{
    protected $table = 'role_privilege';

    protected $fillable = [];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $hidden = ['deleted_at','created_at','updated_at'];

    /**
     * Get the Role that owns the RolePrivilege.
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Get the Privilege that owns the RolePrivilege.
     */
    public function user()
    {
        return $this->belongsTo('App\Privilege');
    }
}
