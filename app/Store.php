<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $table = 'stores';

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
        'mail',
        'phone',
        'indicatif',
        'description',
        'storeable_id',
        'storeable_type',
        'currency_id',
        'miniature',
        'cover',
        'keywords',
        'created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'keywords',
        'cover',
        'created_at',
        'updated_at',
        'deleted_at',
        'storeable_id',
        'storeable_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'delete_at' => 'datetime',
    ];

    /**
     * Get all of the Store's Seen.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Get the Currency that owns the Currency.
     */
    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    /**
     * Get the post's image.
     */
    public function discount()
    {
        return $this->morphOne('App\Discount', 'discountable');
    }

    /**
     * Get all of the Store's Seen.
     */
    public function follows()
    {
        return $this->morphMany('App\Follow', 'followable');
    }

    /**
     * Get the User that owns the Product.
     */
    public function founder()
    {
        return $this->belongsTo('App\User','created_by');
    }

    /**
     * Get the post's image.
     */
    public function location()
    {
        return $this->morphOne('App\Location', 'locationable');
    }

    /**
     * Get the Posts for this Store.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the comments for the blog post.
     */
    public function productStores()
    {
        return $this->hasMany('App\ProductStore');
    }

    /**
     * Get all of the Store's Seen.
     */
    public function seens()
    {
        return $this->morphMany('App\Seen', 'seenable');
    }

    /**
     * Get all of the Store's Seen.
     */
    public function stars()
    {
        return $this->morphMany('App\Star', 'starable');
    }

    /**
     * Get the owning Storeable model.
     */
    public function storeable()
    {
        return $this->morphTo();
    }
}
