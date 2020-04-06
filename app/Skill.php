<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Skill extends Model
{
    protected $guard = 'web';

    protected $fillable = [
        'user_id', 'name', 'score'
    ];

    public function users() {
    	return $this->belongsToMany(User::class);
    }
}
