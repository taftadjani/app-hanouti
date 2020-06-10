<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';

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
        'name',
        'description',
        'mail'
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
     * Get all of the Company's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Get all of the Company's Stars.
     */
    public function follows()
    {
        return $this->morphMany('App\Follow', 'followable');
    }

    /**
     * Get the Location that owns the Company.
     */
    public function locations()
    {
        return $this->morphMany('App\Location','locationable');
    }

    /**
     * Get all of the Company's Stars.
     */
    public function stars()
    {
        return $this->morphMany('App\Star', 'starable');
    }

    /**
     * Get all of the Company's Stores.
     */
    public function stores()
    {
        return $this->morphMany('App\Store', 'storeable');
    }

    /**
     * Get the User that owns the ProductStore.
     */
    public function user()
    {
        return $this->belongsTo('App\User','inserted_by');
    }
}
