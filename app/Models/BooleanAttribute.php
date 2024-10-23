<?php

namespace App\Models;

use App\Contracts\AttributeValueContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BooleanAttribute extends Model implements AttributeValueContract
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'value',
        'people_id',
        'attribute_id'
    ];

    public function people(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function setValue(mixed $value): void
    {
        $this->value = (bool)$value;
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
