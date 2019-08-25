<?php

namespace App\Http\Middleware;

use Closure;
use App\CustomState;

class UserOnboarding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $customState = resolve(CustomState::class);
        dd($customState->needsOnboarding());
        if ($customState->needsOnboarding()) {
            return redirect('/onboard');
        }

        return $next($request);
    }
}
