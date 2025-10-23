<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'admin_permissions',
        'provider',
        'provider_id',
        'provider_token',
        'otp_code',
        'otp_expires_at',
        'is_email_verified',
        'avatar',
        'hometown',
        'occupation',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp_code',
        'provider_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'otp_expires_at' => 'datetime',
            'is_email_verified' => 'boolean',
            'password' => 'hashed',
            'admin_permissions' => 'array',
        ];
    }

    /**
     * Check if user is a super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }

    /**
     * Check if user is an admin (includes superadmin)
     */
    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'superadmin']);
    }

    /**
     * Check if user is a regular user
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /**
     * Check if admin has permission to access a menu item
     */
    public function hasMenuPermission(string $menu): bool
    {
        // SuperAdmin has access to everything
        if ($this->isSuperAdmin()) {
            return true;
        }

        // Regular users have no admin menu access
        if (!$this->isAdmin()) {
            return false;
        }

        // Check if admin has permission for this menu
        $permissions = $this->admin_permissions ?? [];
        return in_array($menu, $permissions);
    }

    /**
     * Backwards compatibility: is_admin attribute accessor
     */
    public function getIsAdminAttribute(): bool
    {
        return $this->isAdmin();
    }
}
