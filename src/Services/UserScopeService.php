<?php

namespace Rizwan3d\SecureScopes\Services;

use Rizwan3d\SecureScopes\Models\UserScope;

class UserScopeService
{
    public static function getBitwiseValue(string $scopeName): int
    {
        $scope = UserScope::where('name', $scopeName)->first();

        return $scope ? $scope->bitwise_value : 0;
    }
}