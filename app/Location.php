<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $table = 'locations';

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
        'inserted_by',
        'city_id',
        'lng',
        'lat',
        'description',
        'zip_code',
        'locationable_id',
        'locationable_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
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
     * Get the City that owns the Location.
     * inserted_by
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * Get the User that owns the Location.
     */
    public function user()
    {
        return $this->belongsTo('App\User' ,'inserted_by');
    }

    /**
     * Get the owning Followable model.
     */
    public function locationable()
    {
        return $this->morphTo();
    }
}
