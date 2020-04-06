<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Jobcategory extends Authenticatable
{

    protected $guard = 'admin';
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'jobcategory',
    ];

    public function jobs() {
    	return $this->hasMany(Job::class, 'jobcategory_id', 'id');
    }
}
