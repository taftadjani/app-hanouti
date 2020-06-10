<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $table = 'cities';
    protected $hidden = ['delete_at','created_at','updated_at'];


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
        'country_id',
        'name',
        'lng',
        'lat',
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
     * Get the Country that owns the City.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the Locations for this City.
     */
    public function locations()
    {
        return $this->hasMany('App\Location');
    }

    /**
     * Get the users for this City.
     */
    public function users()
    {
        return $this->hasMany('App\User','live_at');
    }

}
