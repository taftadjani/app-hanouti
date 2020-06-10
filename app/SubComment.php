<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubComment extends Model
{
    use SoftDeletes;

    protected $table = 'sub_comments';

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
        'sender_id',
        'comment_id',
        'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        // 'created_at',
        'updated_at',
    ];

    /**
     * Get the Comment that owns the SubComment.
     */
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    /**
     * Get the User that owns the SubComment.
     */
    public function user()
    {
        return $this->belongsTo('App\User','sender_id');
    }
}
