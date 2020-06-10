<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

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
        'order_by',
        'currency_id',
        'delivery_id',
        'status',
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
     * Get the Delivery that owns the Order.
     */
    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    /**
     * Get the Delivery that owns the Order.
     */
    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

    /**
     * Get the post's image.
     */
    public function discount()
    {
        return $this->morphOne('App\Discount', 'discountable');
    }

    /**
     * Get the OrderDetails for this Order.
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    /**
     * Get the User that owns the Order.
     */
    public function user()
    {
        return $this->belongsTo('App\User','order_by');
    }
}
