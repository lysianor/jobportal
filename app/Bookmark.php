<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $primaryKey = 'user_id';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $incrementing = false;

    public function jobs() {
        return $this->belongsToMany(Job::class)->withTimeStamps();
    }

    public function users() {
    	return $this->belongsTo(User::class);
    }
}
