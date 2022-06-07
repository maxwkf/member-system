<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            
            $apiClient = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server'),
            ]);
            return new MailchimpNewsletter($apiClient, 'foobar');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Using unguard here, remove all unguard in models
         *  and prevent using request()->all()
         */
        Model::unguard();

        Gate::define('admin', function (User $user) {
            
            return $user?->hasRole('admin');

        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
