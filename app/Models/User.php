<?php

namespace App\Models;

use App\Enum\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use illuminate\support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'role' => Role::class,
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        $user->unique_code = self::generateUniqueCode();
    });
}

    private static function generateUniqueCode()
    {
        do {
            $code = strtoupper(Str::random(8)); // Generates an 8-character unique code
        } while (self::where('unique_code', $code)->exists());

        return $code;
    }

}

