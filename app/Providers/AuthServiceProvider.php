<?php

namespace App\Providers;

use App\Policies\SkillPolicy;
use App\Policies\LanguagePolicy;
use App\Policies\EducationPolicy;
use App\Policies\ExperiencePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Skill::class => SkillPolicy::class,
        \App\Language::class => LanguagePolicy::class,
        \App\Education::class => EducationPolicy::class,
        \App\Experience::class => ExperiencePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
