<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role == $role) {
            return $next($request);
        }
        toastr()->error('Anda tidak memiliki hak mengakses laman tersebut!', 'Gagal!');
        return back();
        // return redirect()->back()->with(['error' => 'Anda tidak memiliki hak mengakses laman tersebut!']);
        
    }
}
