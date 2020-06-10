<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;

    protected $table = 'prices';

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
        'product_store_id',
        'currency_id',
        'unit_id',
        'value',
        'enabled',
        'quantity',
        'enabled_at',
        'disabled_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'enabled_at',
        'disabled_at',
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
        'enabled_at'=> 'datetime',
        'disabled_at'=> 'datetime',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    /**
     * Get the post that owns the comment.
     */
    public function productStore()
    {
        return $this->belongsTo('App\ProductStore');
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User','inserted_by');
    }

    /**
     * Get the Unit that owns the Price.
     */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
