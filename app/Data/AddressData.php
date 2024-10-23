<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class AddressData extends Data
{
    public function __construct(
        public ?int $id,
        public string $country,
        public string $region,
        public string $city,
        public string $street,
        public string $house
    ) {
    }
}
