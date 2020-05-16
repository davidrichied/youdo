<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leest extends Model
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
    ];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
