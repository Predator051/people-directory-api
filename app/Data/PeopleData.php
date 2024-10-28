<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class PeopleData extends Data
{
    public function __construct(
        public ?int $id,
        #[MapInputName('attributes')]
        #[MapOutputName('attributes')]
        #[DataCollectionOf(AttributeValueData::class)]
        public array $attributes
    ) {
    }
}
