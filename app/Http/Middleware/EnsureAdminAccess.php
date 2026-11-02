<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('X-Demo-Role') !== 'admin') {
            abort(403, 'Akses ditolak. Route ini khusus admin.');
        }

        return $next($request);
    }
}