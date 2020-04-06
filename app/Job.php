<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Job extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'title', 'jobcategory_id', 'description','company_id', 'work_type', 'location', 'experience', 'salary'
    ];

    public function jobcategory() {
    	return $this->belongsTo(Jobcategory::class);
    }

    public function tags() {
    	return $this->belongsToMany(Tag::class);
    }

    public function applicants() {
        return $this->belongsToMany(Applicant::class, 'applicant_job', 'job_id', 'applicant_user_id');
    }

    public function bookmarks() {
        return $this->belongsToMany(Applicant::class);
    }

    public function company() {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function scopeSearchResults($query)
    {
        return $query->when(!empty(request()->input('company', 0)), function($query) {
            $query->whereHas('company', function($query) {
                $query->whereId(request()->input('company'));
            });
        })
        ->when(!empty(request()->input('category', 0)), function($query) {
            $query->whereHas('jobcategory', function($query) {
                $query->whereId(request()->input('category'));
            });
        })
        ->when(!empty(request()->input('search', '')), function($query) {
            $query->where(function($query) {
                $search = request()->input('search');
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%")
                    ->orWhere('work_type', 'LIKE', "%$search%")
                    ->orWhereHas('company', function($query) use($search) {
                        $query->where('name', 'LIKE', "%$search%");
                    });
            });
        });
    }
}
