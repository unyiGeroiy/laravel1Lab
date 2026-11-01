<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Season extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'doctor',
        'actor',
        'premiere_date',
        'short_description',
        'description',
        'key_episodes',
        'main_enemies',
        'image_path',
    ];

    protected function premiereDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => trim($value),
        );
    }
}