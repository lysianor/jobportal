<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guard = 'admin';

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'tag',
    ];


    public function jobs() {
    	return $this->belongsToMany(Job::class);
    }
}
