<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface AttributeValueContract
{
    public function people(): BelongsTo;

    public function attribute(): BelongsTo;

    public function setValue(mixed $value): void;
}
