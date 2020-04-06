<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guard = 'admin';
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'name','description', 'description', 'location', 'contact_number','email','website','company_logo',
    ];

    public function jobs() {
    	return $this->hasMany(Job::class);
    }
}
