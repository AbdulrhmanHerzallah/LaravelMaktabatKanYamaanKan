<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class AdminRejectionMiddleware
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
        $user = User::find(auth()->id());
        if ((int) $user->permission == 1)
        {
            return redirect('/dashboard');
        }
        return $next($request);

    }
}
