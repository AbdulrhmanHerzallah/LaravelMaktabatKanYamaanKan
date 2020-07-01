<?php

namespace App\Http\Middleware;
use App\Models\User;

use Closure;

class AdminMiddleware
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
            return $next($request);
        }
        return redirect('/dashboard');

    }
}
