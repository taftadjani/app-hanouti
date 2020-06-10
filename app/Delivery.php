<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use SoftDeletes;

    protected $table = 'deliveries';

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
        'user_id',
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
     * Get the DeliveryMode that owns the Delivery.
     */
    public function deliveryMode()
    {
        return $this->belongsTo('App\DeliveryMode');
    }

    /**
     * Get the Location that owns the Delivery.
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    /**
     * Get the Orders for this Delivery.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Get the Location that owns the Delivery.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
