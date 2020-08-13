<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckIsAdmin
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
        $user = Auth::user();
        if (!$user->isAdmin()) {
            session()->flash('warning', 'У вас нет прав администратора');
            return redirect()->route('home');
        }
        return $next($request);
    }
}
