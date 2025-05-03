<?php

namespace App\Repositories\Eloquent;

use App\Models\Campaign;
use App\Repositories\Interfaces\CampaignRepositoryInterface;

class CampaignRepository implements CampaignRepositoryInterface
{
    /** @param array<string, mixed> $data */
    public function create(array $data): Campaign
    {
        return Campaign::create($data);
    }

    /** @return iterable<Campaign> */
    public function all(): iterable
    {
        return Campaign::all();
    }

    public function find(int $id): ?Campaign
    {
        return Campaign::find($id);
    }
}
