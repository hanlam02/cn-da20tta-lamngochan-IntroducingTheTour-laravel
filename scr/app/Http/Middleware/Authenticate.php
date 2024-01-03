<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        //dd('Checking authentication');
        // Kiểm tra xem người dùng đã đăng nhập chưa
        
        

        if (!Auth::check()) {
            return redirect()->route('admin.index');
        }
        return $next($request);
    }
}
