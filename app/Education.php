<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Education extends Model
{
    protected $guard = 'web';

    protected $fillable = [
        'user_id', 'school', 'month', 'year', 'qualification', 'field_study', 'major'
    ];

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
