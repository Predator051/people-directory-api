<?php

namespace App\Dto;

use App\Contracts\DtoContract;

readonly class CreateGrantDto implements DtoContract
{
    public function __construct(
        private string $name,
        private bool $allowRead,
        private bool $allowWrite,
        private bool $allowHistoryRead,
        private bool $declineRead,
        private bool $declineWrite,
        private bool $declineHistoryRead
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['allow_read'],
            $data['allow_write'],
            $data['allow_history_read'],
            $data['decline_read'],
            $data['decline_write'],
            $data['decline_history_read']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'allow_read' => $this->allowRead,
            'allow_write' => $this->allowWrite,
            'allow_history_read' => $this->allowHistoryRead,
            'decline_read' => $this->declineRead,
            'decline_write' => $this->declineWrite,
            'decline_history_read' => $this->declineHistoryRead
        ];
    }
}
