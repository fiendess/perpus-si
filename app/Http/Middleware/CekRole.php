<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;    
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
       $user = Auth::user();

        $roles = [
            'admin' => 1,
            'user' => 0,
        ];

         if ($user && isset($roles[$role]) && $user->id_role == $roles[$role]) {
            return $next($request);
        }

        // Jika tidak sesuai, alihkan atau beri respons error
        return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
