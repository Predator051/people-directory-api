<?php

namespace App\Models;

use App\Contracts\AttributeValueContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DateAttribute extends Model implements AttributeValueContract
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

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'value' => 'datetime',
        ];
    }

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
        $this->value = $value;
    }
}
