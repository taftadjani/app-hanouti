<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $table = 'order_details';

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
        'order_id',
        'unit_id',
        'price_id',
        'product_store_id',
        'quantity',
        'status',
        'paids',
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
     * Get the Order that owns the OrderDetail.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Get the ProductStore that owns the OrderDetail.
     */
    public function productStore()
    {
        return $this->belongsTo('App\ProductStore');
    }

    /**
     * Get the ProductStore that owns the OrderDetail.
     */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    /**
     * Get the ProductStore that owns the OrderDetail.
     */
    public function price()
    {
        return $this->belongsTo('App\Price');
    }
}
