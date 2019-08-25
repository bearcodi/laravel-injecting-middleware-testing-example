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

        if ($customState->needsOnboarding() && $request->route()->getName() !== 'onboarding') {
            return redirect(route('onboarding'));
        }

        return $next($request);
    }
}
