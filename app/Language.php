<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Language extends Model
{
    protected $guard = 'web';

    protected $fillable = [
        'user_id', 'name', 'read', 'write', 'speak'
    ];

    public function users() {
    	return $this->belongsToMany(User::class);
    }
}
