<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_owner',
    ];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function purchase(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function bankAccount(): HasMany
    {
        return $this->hasMany(BankAccount::class);
    }
}
