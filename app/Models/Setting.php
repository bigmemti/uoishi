<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'value'
    ];

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn($value) => $value
        );
    }

    public function value(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn($value) => $value
        );
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn($value) => $value
        );
    }
}
