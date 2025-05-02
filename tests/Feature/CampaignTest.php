<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

/*
|--------------------------------------------------------------------------
| Bind this file to Laravel's TestCase
|--------------------------------------------------------------------------
|
| Pest needs to know this file should use Laravel's test features.
| This ensures `$this->postJson()` and facades work properly.
|
*/
uses(Tests\TestCase::class, RefreshDatabase::class)->in(__DIR__);

it('requires authentication to create a campaign', function () {
    $response = $this->postJson('/api/campaigns', []);
    $response->assertUnauthorized();
});

it('creates a campaign with valid data', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $payload = [
        'title' => 'Clean Water Project',
        'description' => 'Build wells',
        'target_amount' => 10000,
    ];

    $response = $this->postJson('/api/campaigns', $payload);

    $response->assertCreated()
        ->assertJsonFragment([
            'title' => 'Clean Water Project',
        ]);

    $this->assertDatabaseHas('campaigns', [
        'title' => 'Clean Water Project',
        'user_id' => $user->id,
    ]);
});
