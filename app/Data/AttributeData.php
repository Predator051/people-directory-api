<?php

namespace App\Data;

use App\Enums\AttributeType;
use Spatie\LaravelData\Data;

class AttributeData extends Data
{
    public function __construct(
        public ?int $id,
        public string $title,
        public AttributeType $type
    ) {
    }
}
