<?php

namespace App\Contracts;

interface DtoContract
{
    public static function fromArray(array $data): self;

    public function toArray(): array;
}
