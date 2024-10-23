<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class AttributeValueData extends Data
{
    public function __construct(
        public ?int $id,
        public int|string|bool $value,
        public int $attribute_id,
        public ?int $people_id,
        public ?AttributeData $attributeData
    ) {
    }
}
