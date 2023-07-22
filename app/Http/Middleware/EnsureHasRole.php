<?php

namespace App\Http\Middleware;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
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
    public function handle(Request $request, Closure $next, ...$name)
    {
        if (!Role::whereIn('name', $name)->pluck('id')->contains($request->user()->role_id)) {
            Alert::alert('Title', 'Message', 'Type');
            return redirect()->route('auth');
        }

        return $next($request);
    }
}
