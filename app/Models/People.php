<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class People extends Model
{
    use HasFactory;

    protected $attributes = [
        'system_description' => ''
    ];

    public function boolAttributeValues(): HasMany
    {
        return $this->hasMany(BooleanAttribute::class);
    }

    public function stringAttributeValues(): HasMany
    {
        return $this->hasMany(StringAttribute::class);
    }

    public function numericAttributeValues(): HasMany
    {
        return $this->hasMany(NumericAttribute::class);
    }

    public function dateAttributeValues(): HasMany
    {
        return $this->hasMany(DateAttribute::class);
    }

    public function attributeValues(): Collection
    {
        $boolAttributes = $this->boolAttributeValues()->with('attribute')->get();
        $stringAttributes = $this->stringAttributeValues()->with('attribute')->get();
        $numericAttributes = $this->numericAttributeValues()->with('attribute')->get();
        $dateAttributes = $this->dateAttributeValues()->with('attribute')->get();

        return $boolAttributes
            ->concat($stringAttributes)
            ->concat($numericAttributes)
            ->concat($dateAttributes);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
