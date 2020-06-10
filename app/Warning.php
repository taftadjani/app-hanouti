<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warning extends Model
{
    use SoftDeletes;

    protected $table = 'warnings';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'user_id',
        'enabled',
        'warning_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'deleted_at','created_at','updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the admin that owns the Warning.
     */
    public function admin()
    {
        return $this->belongsTo('App\User','admin_id');
    }
    /**
     * Get the User that owns the Warning.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the User that owns the Warning.
     */
    public function warrantyType()
    {
        return $this->belongsTo('App\WarningType');
    }
}
