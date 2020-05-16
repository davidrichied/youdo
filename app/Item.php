<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'order',
        'is_ordered',
        'is_complete',
        'leest_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leest()
    {
        return $this->belongsTo(Leest::class);
    }
}
