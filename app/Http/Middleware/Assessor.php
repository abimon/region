<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Assessor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role= Auth::user()->role;
        if($role=='Assessor' || $role=='Admin' || $role =='CYD/FYD'||$role=='Director'){
            return $next($request);
        }
        return redirect('not_allowed');
    }
}
