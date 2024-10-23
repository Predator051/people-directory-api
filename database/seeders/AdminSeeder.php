<?php

namespace Database\Seeders;

use App\Dto\CreateUserDto;
use App\Models\People;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function __construct(private UserService $userService)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = People::query()->create([
            'system_description' => ''
        ]);

        $this->userService->create(
            new CreateUserDto(
                'Admin',
                'aleksey.kukishev@gmail.com',
                'securePassword123',
                $people->id
            )
        );
    }
}
