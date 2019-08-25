# Laravel Example application playing with custom middleware and app containers in testing

> This was done using Laravel 5.8 but is easily portable to newer versions.

This is an exercise to scratch an itch and to respond to a [Laracasts thread](https://laracasts.com/discuss/channels/testing/app-singleton-and-no-session), feel free to use it as a jumping point for something magical!!!

## Classes that make this happen

Class | Purpose
:-   | :-  
[`App\CustomState`](app/CustomState.php) | A simple object that adds checks on the authenticated user.
[`App\Http\Middleware\UserOnboarding`](app/Http/Middleware/UserOnboarding.php) | Our custom middleware that uses the `CustomState` class to check that a user needs onboarding.
[`App\Providers\AppServiceProvider`](app/Providers/AppServiceProvider.php) | Where we register our singleton instance of `CustomState`
[`App\Http\Kernel`](app/Http/Kernel.php) | Where we register our custom middleware.
