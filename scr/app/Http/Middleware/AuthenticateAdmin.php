<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        // Kiểm tra xem người dùng có quyền admin hay không
        if (Auth::user()->email === 'admin@example.com') {
            return redirect()->route('admin.index');
        }

        // Nếu không phải là admin, có thể chuyển hướng hoặc xử lý tùy theo logic của bạn
        // Ở đây, tôi sử dụng return $next($request) để tiếp tục xử lý request
        return $next($request); 
    }
}