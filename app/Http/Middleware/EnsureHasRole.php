<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Closure;
use Illuminate\Http\Request;

class EnsureHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$name
     * @return Response|RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next, ...$name): Response|RedirectResponse|JsonResponse
    {
        if (!Role::whereIn('name', $name)->pluck('id')->contains($request->user()->role_id)) {
            Alert::warning('Mohon Maaf','Account Anda tidak memiliki akses');
            return redirect()->route('auth');
        }

        return $next($request);
    }
}
