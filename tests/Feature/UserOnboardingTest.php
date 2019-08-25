<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserOnboardingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_if_a_user_needs_to_be_onboarded()
    {
        $this->withoutExceptionHandling();

        $now = now();

        $this->actingAs($user = factory(User::class)->create([
            'created_at' => $now,
            'updated_at' => $now
        ]));

        $response = $this->get('/user');

        $response->assertRedirect(route('onboarding'));
    }
}
