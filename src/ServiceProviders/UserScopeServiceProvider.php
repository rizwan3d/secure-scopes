<?php
namespace Rizwan3d\SecureScopes\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Rizwan3d\SecureScopes\Middleware\CheckScope;

class UserScopeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['router']->aliasMiddleware('checkScope', CheckScope::class);
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}