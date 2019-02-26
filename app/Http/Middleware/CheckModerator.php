<?php

namespace App\Http\Middleware;

use Closure;
use Flash;
use Auth;

class CheckModerator
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id > 2) {
            Flash::error('Permission denied');

            return redirect('/transactions');
        }

        return $next($request);
    }
}
