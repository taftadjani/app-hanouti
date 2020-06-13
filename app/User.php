<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'users';

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
        'first_name',
        'last_name',
        'nickname',
        'birthday',
        'email',
        'enabled',
        'gender',
        'lang',
        'live_at',
        'nationality',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
        'enabled',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'birthday' => 'datetime',
    ];

    public function isSeller()
    {
        if ( $this->roles->count()>=1 && $this->role()->reference === config('app.role.seller')) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if ( $this->roles->count()>=1 && $this->role()->reference === config('app.role.admin')) {
            return true;
        }
        return false;
    }

    /**
     * Get the Permission boolean for this User.
     */
    public function haveAccess($permission)
    {
        // Perform some operation to allow the user
        $user = Auth::user();
        $permission_result =  $user->role()->privileges->where("name",$permission);
        if (count($permission_result) > 0) {
            return true;
        }
        return false;
    }

    /**
     * Get the Warning for this User.
     */
    public function adminWarning()
    {
        return $this->hasMany('App\Warning', 'admin_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function authors()
    {
        return $this->hasMany('App\Author');
    }

    /**
     * Get the Carts record associated with this User.
     */
    public function carts(){
        return $this->hasMany('App\Cart');
    }

    /**
     * Get the City that owns the User.
     */
    public function city()
    {
        return $this->belongsTo('App\City','live_at');
    }

    /**
     * Get the Comments for this User.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'sender_id');
    }

    /**
     * Get the Companies for this User.
     */
    public function companies()
    {
        return $this->hasMany('App\Company', 'inserted_by');
    }

    /**
     * Get the Country that owns the User.
     */
    public function country()
    {
        return $this->belongsTo('App\Country','nationality');
    }

    /**
     * Get the Discounts for this User.
     */
    public function deliveries()
    {
        return $this->hasMany('App\Delivery');
    }

    /**
     * Get the Discounts for this User.
     */
    public function discounts()
    {
        return $this->hasMany('App\Discount', 'inserted_by');
    }

    /**
     * Get all of the Store's Seen.
     */
    public function follows()
    {
        return $this->hasMany('App\Follow', 'followed_by');
    }

    /**
     * Get the Languages for this User.
     */
    public function languages()
    {
        return $this->hasMany('App\Language');
    }

    /**
     * Get the Locations for this User.
     */
    public function locations()
    {
        return $this->hasMany('App\Location', 'inserted_by');
    }

    /**
     * Get the Messages for this User.
     */
    public function messages()
    {
        return $this->hasMany('App\Message', 'sender_id');
    }

    /**
     * Get the Locations for this User.
     */
    public function myLocations()
    {
        return $this->morphMany('App\Location', 'locationable');
    }

    /**
     * Get the Newsletters for this User.
     */
    public function newsletters()
    {
        return $this->hasMany('App\Newsletter', 'inserted_by');
    }

    /**
     * Get the Order for this User.
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'order_by');
    }

    /**
     * Get the Phones for this User.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Get the Posts for this User.
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'posted_by');
    }

    /**
     * Get the ProductStore for this User.
     */
    public function prices()
    {
        return $this->hasMany('App\Price','inserted_by');
    }

    /**
     * Get the Product for this User.
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'inserted_by');
    }

    /**
     * Get the ProductStore for this User.
     */
    public function productStore()
    {
        return $this->hasMany('App\ProductStore','inserted_by');
    }

    /**
     * Get the Providers for this User.
     */
    public function providers()
    {
        return $this->hasMany('App\Provider', 'inserted_by');
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        // Get role that much an active roleUser and get with the roleUser_id for getting the last one
        return $this->belongsToMany('App\Role','role_user')->where('enabled',1)->withPivot('id')->orderBy('pivot_id','asc');
    }

    /**
     * The roles that belong to the user.
     */
    public function role()
    {
        // Get role that much an active roleUser and get with the roleUser_id for getting the last one
        return $this->roles[$this->roles->count()-1];
    }

    /**
     * Get all of the Post's comments.
     */
    public function seens()
    {
        return $this->hasMany('App\Seen');
    }

    /**
     * Get all of the Post's comments.
     */
    public function showMe()
    {
        return $this->morphMany('App\Seen', 'seenable');
    }

    /**
     * Get the Stars for this User.
     */
    public function stars()
    {
        return $this->hasMany('App\Star' , 'inserted_by');
    }

    /**
     * Get all of the User's Stores.
     */
    public function stores()
    {
        return $this->morphMany('App\Store', 'storeable');
    }

    /**
     * Get the SubComments for this User.
     */
    public function subComments()
    {
        return $this->hasMany('App\SubComment', 'sender_id');
    }

    /**
     * Get the Warning for this User.
     */
    public function warnings()
    {
        return $this->hasMany('App\Warning');
    }
}
