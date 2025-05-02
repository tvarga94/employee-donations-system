<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('requires authentication to donate', function () {
    $response = $this->postJson('/api/donations', []);
    $response->assertUnauthorized();
});

it('allows authenticated user to donate to a campaign', function () {
    $user = User::factory()->create();
    $campaign = Campaign::factory()->create();

    $payload = [
        'campaign_id' => $campaign->id,
        'amount' => 25.00,
    ];

    $response = $this
        ->actingAs($user)
        ->postJson('/api/donations', $payload);

    $response->assertStatus(201)
        ->assertJsonFragment(['message' => 'Donation successful.']);
});
