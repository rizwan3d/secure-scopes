<?php
namespace Rizwan3d\SecureScopes\Traits;

use Rizwan3d\SecureScopes\Services\UserScopeService;

trait HasScopes
{
    public function addScope(string $scopeName)
    {
        $bitwiseValue = UserScopeService::getBitwiseValue($scopeName);
        $this->scopes |= $bitwiseValue;
        $this->save();
    }

    public function hasScope(string $scopeName): bool
    {
        $bitwiseValue = UserScopeService::getBitwiseValue($scopeName);

        return ($this->scopes & $bitwiseValue) === $bitwiseValue;
    }

    public function removeScope(string $scopeName)
    {
        $bitwiseValue = UserScopeService::getBitwiseValue($scopeName);
        $this->scopes &= ~$bitwiseValue;
        $this->save();
    }
}