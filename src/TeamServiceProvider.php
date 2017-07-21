<?php

namespace Tsameem\Team;

use Illuminate\Support\ServiceProvider;

class TeamServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            // publishing all views
            __DIR__.'/views' => base_path('resources/views/tsameem'),
            // publishing all controllers
            __DIR__.'/controllers' => base_path('app/Http/Controllers'),
        ]);
        $this->publishes([
            // adding the modified config auth file
            __DIR__.'/req/auth.php' => config_path('auth.php'),
            // adding required handler for redirecting unauthenticated users
            __DIR__.'/req/Handler.php' => base_path('app/Exceptions/Handler.php'),
            // adding required middleware for redirecting authenticated admin
            __DIR__.'/req/RedirectIfAuthenticated.php' => base_path('app/Http/Middleware/RedirectIfAuthenticated.php'),
            // adding basic admin middleware
            __DIR__.'/req/AdminMiddleware.php' => base_path('app/Http/Middleware/AdminMiddleware.php'),
            // adding team middleware
            __DIR__.'/req/TeamMiddleware.php' => base_path('app/Http/Middleware/TeamMiddleware.php'),
            // adding admin model
            __DIR__.'/req/Admin.php' => base_path('app/Admin.php'),
            // adding role model
            __DIR__.'/req/Role.php' => base_path('app/Role.php'),
            // adding AdminRole model
            __DIR__.'/req/AdminRole.php' => base_path('app/AdminRole.php'),
            // adding admin reset password notification file
            __DIR__.'/req/AdminResetPasswordNotification.php' => base_path('app/Notifications/AdminResetPasswordNotification.php'),
            // adding required migration tables
            __DIR__.'/req/2017_04_25_202645_create_Admins_Table.php' => base_path('database/migrations/2017_04_25_202645_create_Admins_Table.php'),
            __DIR__.'/req/2017_05_10_030322_create_roles_table.php' => base_path('database/migrations/2017_05_10_030322_create_roles_table.php'),
            __DIR__.'/req/2017_05_10_163548_create_admin_role_table.php' => base_path('database/migrations/2017_05_10_163548_create_admin_role_table.php'),
            // adding the modified kernel file
            __DIR__.'/req/kernel.php' => base_path('app/Http/kernel.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes/routes.php';
    }
}
