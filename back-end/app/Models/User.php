<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'task_per_page',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function prefixes()
    {
        return $this->hasMany(Prefix::class);
    }

    protected function taskPerPage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value?? getSetting('task_per_page'),
        );
    }

    const USER_TYPE = 2;
    const ADMIN_TYPE = 1;

    public function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn ($value,$attrs) => $attrs['type'] == self::ADMIN_TYPE,
        );
    }
}
