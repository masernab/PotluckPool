<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'bank_name',
            'account_number',
            'account_holder_name',
        ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

}
