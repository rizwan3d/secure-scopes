<?php
namespace Rizwan3d\SecureScopes\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckScope
{
    public function handle($request, Closure $next, ...$scopes)
    {
        $user = Auth::user();

        foreach ($scopes as $scope) {
            if (!$user->hasScope($scope)) {
                abort(403, 'Unauthorized - Insufficient scope.');
            }
        }

        return $next($request);
    }
}