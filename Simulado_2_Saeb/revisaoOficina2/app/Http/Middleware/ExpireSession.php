<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpireSession
{
    public function handle(Request $request, Closure $next): Response
    {
        $timeout = (int) config('session.lifetime', 30) * 60;
        $last = $request->session()->get('last_activity_at');
        if ($last && now()->timestamp - $last >= $timeout) {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors(['email' => 'Sua sessão expirou. Entre novamente.']);
        }
        $request->session()->put('last_activity_at', now()->timestamp);

        return $next($request);
    }
}