<?php

namespace App\Repositories\Interfaces;

use App\Models\Campaign;

interface CampaignRepositoryInterface
{
    /** @param array<string, mixed> $data */
    public function create(array $data): Campaign;

    /** @return iterable<Campaign> */
    public function all(): iterable;

    public function find(int $id): ?Campaign;
}
