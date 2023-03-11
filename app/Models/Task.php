<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn($value) => $value
        );
    }

    public function user_id(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn($value) => $value
        );
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn($value) => $value
        );
    }
}
