<?php

namespace App\Dto;

use App\Contracts\DtoContract;

readonly class UpdateGrantDto implements DtoContract
{
    public function __construct(
        private int $id,
        private string $name,
        private bool $allowRead,
        private bool $allowWrite,
        private bool $allowHistoryRead,
        private bool $declineRead,
        private bool $declineWrite,
        private bool $declineHistoryRead
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function fromArray(array $data): UpdateGrantDto
    {
        return new self(
            $data['id'],
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
            'id' => $this->id,
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
