<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStore extends Model
{
    use SoftDeletes;

    protected $table = 'product_stores';

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
        'condition_id',
        'store_id',
        'product_id',
        'unit_id',
        'inserted_by',
        'name',
        'description',
        'keywords',
        'images',
        'have_return',
        'visible_on_store',
        'negociable',
        'quantity'
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
     * Get the CartDetails for this ProductStore.
     */
    public function cartDetails()
    {
        return $this->hasMany('App\CartDetail');
    }

    /**
     * Get all of the Post's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Get the post that owns the comment.
     */
    public function condition()
    {
        return $this->belongsTo('App\Condition');
    }

    /**
     * Get the post's image.
     */
    public function discount()
    {
        return $this->morphOne('App\Discount', 'discountable');
    }

    /**
     * Get the post's image.
     */
    public function location()
    {
        return $this->morphOne('App\Location', 'locationable');
    }

    /**
     * Get the Modele for this User.
     */
    public function modele()
    {
        return $this->belongsToMany('App\Modele','product_store_modele');
    }

    /**
     * Get the OrderDetails for this ProductStore.
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    /**
     * Get the comments for the blog post.
     */
    public function prices()
    {
        return $this->hasMany('App\Price')->where('enabled', 1);
    }

    /**
     * Get the Product for this ProductStore.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * Get the comments for the blog post.
     */
    public function productStoreDetails()
    {
        return $this->hasMany('App\ProductStoreDetail');
    }

    /**
     * The categories that belong to the role.
     */
    public function providers()
    {
        return $this->belongsToMany('App\Provider', 'product_store_provider');
    }

    /**
     * Get all of the Post's comments.
     */
    public function seens()
    {
        return $this->morphMany('App\Seen', 'seenable');
    }

    /**
     * Get all of the Post's comments.
     */
    public function stars()
    {
        return $this->morphMany('App\Star', 'starable');
    }

    /**
     * Get the Product for this ProductStore.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    /**
     * The subcategories that belong to the role.
     */
    public function subCategories()
    {
        return $this->belongsToMany('App\SubCategory','product_store_sub_category');
    }

    /**
     * Get the User that owns the ProductStore.
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
