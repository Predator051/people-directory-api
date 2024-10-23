<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Church extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address_id',
        'union_id'
    ];

    public function union(): BelongsTo
    {
        return $this->belongsTo(Union::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
