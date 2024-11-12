<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        // التحقق من دور المستخدم إذا كان أدمن
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // السماح للأدمن بالوصول
        }

        // إذا لم يكن المستخدم أدمن، إعادة التوجيه إلى الصفحة الرئيسية مع رسالة خطأ
        return redirect('/')->with('error', 'Unauthorized access!');
    }
}
