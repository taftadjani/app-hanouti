<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $table = 'currencies';

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
        'name',
        'symbol',
        'iso_code',
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
     * Get the Carts for this Currency.
     */
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    /**
     * Get the Countrys for this Currency.
     */
    public function countries()
    {
        return $this->hasMany('App\Country');
    }

    /**
     * Get the comments for the blog post.
     */
    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    /**
     * Get the Stores for this Currency.
     */
    public function stores()
    {
        return $this->hasMany('App\Store');
    }

}
