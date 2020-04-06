<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guard = 'web';

    protected $fillable = [
        'user_id', 'position', 'company', 'from_month', 'from_year', 'to_month', 
        'to_year', 'specialization', 'role', 'industry', 'position_level', 'description'
    ];

    public function users() {
    	return $this->belongsToMany(User::class);
    }
}
