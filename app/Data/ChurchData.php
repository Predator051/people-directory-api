<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\FromRouteParameter;
use Spatie\LaravelData\Data;

class ChurchData extends Data
{
    public function __construct(
        #[FromRouteParameter('id')]
        public ?int $id,
        public string $name,
        public int $address_id,
        public int $union_id,
        public ?UnionData $union,
        public ?AddressData $address,
    ) {
    }
}
