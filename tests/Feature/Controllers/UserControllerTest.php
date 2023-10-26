<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use App\Http\Controllers\UserController;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_users(): void
    {
        User::factory()
            ->for(Team::factory())
            ->create();

        $this
            ->getJson(route('users.index'))
            ->assertSuccessful()
            ->dd();
    }
}
