<?php

namespace App\Repositories\Interfaces;

use App\Models\Campaign;

interface CampaignRepositoryInterface
{
    public function create(array $data): Campaign;
    public function all(): iterable;
    public function find(int $id): ?Campaign;
}
