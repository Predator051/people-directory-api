<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\FromRouteParameter;
use Spatie\LaravelData\Data;

class UnionData extends Data
{
    public function __construct(
        #[FromRouteParameter('id')]
        public ?int $id,
        public string $name,
        public string $description,
        /** @var array<ChurchData> */
        public ?array $churches
    ) {
    }
}
