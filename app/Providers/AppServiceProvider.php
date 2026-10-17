<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Support\EmailConfiguration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $command = $_SERVER['argv'][1] ?? null;
        $mailRuntimeCommands = ['queue:work', 'queue:listen', 'schedule:run', 'test'];
        if (! app()->runningInConsole() || in_array($command, $mailRuntimeCommands, true)) {
            EmailConfiguration::apply();
        }

        RateLimiter::for('admin-login', function (Request $request) {
            $email = mb_strtolower((string) $request->input('email'));

            return [
                Limit::perMinute(5)->by('admin-login-ip:'.$request->ip()),
                Limit::perMinute(5)->by('admin-login-credential:'.$request->ip().'|'.$email),
            ];
        });
    }
}
