<?php

namespace App\Providers;

use DB;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use RateLimiter;

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
        //

        $loginRateLimitingResponse = function (Request $request) {

            $errorMessage = 'Too many login attempts. Please try again later.';

            if ($request->expectsJson()) {
                return response()->json([
                    'email' =>  $errorMessage,
                ], 429);
            }

            return back()
                ->withInput($request->except('password'))
                ->withErrors([
                    'email' => $errorMessage
                ]);
        };

        RateLimiter::for('login', function (Request $request) use ($loginRateLimitingResponse) {
            return [
                Limit::perMinute(100)->by($request->ip())->response($loginRateLimitingResponse),
                Limit::perMinute(5)->by($request->input('email'))->response($loginRateLimitingResponse)
            ];
        });

        RateLimiter::for('password-reset-request', function (Request $request) {
            return [
                Limit::perHour(10)->by($request->ip()),
                Limit::perHour(3)->by($request->input('email')),
            ];
        });

        RateLimiter::for('password-reset', function (Request $request) {
            return [
                Limit::perHour(5)->by($request->ip()),
                Limit::perHour(3)->by($request->input('email')),
            ];
        });

        Password::defaults(function () {

            if ($this->app->isLocal()) {
                return Password::min(8);
            }

            return Password::min(8)
                ->mixedCase()
                ->uncompromised()
                ->letters()
                ->numbers()
                ->symbols();
        });


//        DB::listen(function (QueryExecuted $query) {
//            \Log::info($query->sql, ['bindings' => $query->bindings, 'time' => $query->time]);
//        });
    }
}
