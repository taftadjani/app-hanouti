<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $table = 'providers';

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
        'complete_name',
        'description',
        'mail',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
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
     * Get the Location that owns the Provider.
     */
    public function location()
    {
        return $this->morphMany('App\Location','locationable');
    }

    /**
     * Get all of the post's comments.
     */
    public function mail()
    {
        return $this->belongsTo('App\Mail');
    }

    /**
     * Get all of the post's comments.
     */
    public function phones()
    {
        return $this->morphMany('App\Phone', 'phoneable');
    }

    /**
     * The categories that belong to the role.
     */
    public function productStores()
    {
        return $this->belongsToMany('App\ProductStore', 'product_store_provider');
    }

    /**
     * Get the User that owns the Provider.
     */
    public function user()
    {
        return $this->belongsTo('App\User','inserted_by');
    }
}
