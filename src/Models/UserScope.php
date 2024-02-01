<?php

namespace Rizwan3d\SecureScopes\Models;

use Illuminate\Database\Eloquent\Model;

class UserScope extends Model
{
    protected $fillable = ['name', 'value'];

    protected static function booted()
    {
        static::creating(function ($userScope) {
            $userScope->value = static::generateBitwiseValue();
        });
    }

    private static function generateBitwiseValue()
    {
        // Generate a unique bitwise value for each scope
        return 1 << (static::count() % 63); // Use 63 to avoid overflow
    }
}
