<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'name',
            'description',
            'location',
            'date',
        ];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function arragner(): ?Member
    {
        return $this->members()->where('is_owner', 1)->first();
    }
}
