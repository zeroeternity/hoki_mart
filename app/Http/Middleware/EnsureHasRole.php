<?php

namespace App\Http\Middleware;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class EnsureHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$role_name)
    {
        if (!$request->user() || !$request->user()->role_id) {
            return redirect('/auth');
        }
        
        if (!Role::whereIn('role_name', $role_name)->pluck('id')->contains($request->user()->role_id)) {
            return HandlerResponse::responseJSON(['message' => 'Akun tidak memiliki hak akses!'], 403);
        }

        return $next($request);
    }
}
