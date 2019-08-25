<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use App\CustomState;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomStateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_requires_onboarding_when_the_created_and_updated_timestamps_are_identical()
    {
        $now = now();

        $this->actingAs($user = factory(User::class)->create([
            'created_at' => $now,
            'updated_at' => $now
        ]));

        $customState = resolve(CustomState::class);

        $this->assertTrue($customState->needsOnboarding());
    }
}
