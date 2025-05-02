<?php

namespace App\Repositories\Eloquent;

use App\Models\Campaign;
use App\Repositories\Interfaces\CampaignRepositoryInterface;

class CampaignRepository implements CampaignRepositoryInterface
{
    public function create(array $data): Campaign
    {
        return Campaign::create($data);
    }

    public function all(): iterable
    {
        return Campaign::all();
    }

    public function find(int $id): ?Campaign
    {
        return Campaign::find($id);
    }
}
