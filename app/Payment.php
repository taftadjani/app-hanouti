<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';

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
        'payment_method_id',
        'user_id',
        'order_id',
        'payment_method_id',
        'amount',
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
     * Get the Bill that owns the Payment.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Get the PaymentMethod that owns the Payment.
     */
    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod');
    }

    /**
     * Get the PaymentMethod that owns the Payment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
