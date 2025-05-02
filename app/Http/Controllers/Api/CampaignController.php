<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampaignRequest;
use App\Repositories\Interfaces\CampaignRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function __construct(
        protected CampaignRepositoryInterface $campaignRepository
    ) {}

    public function store(StoreCampaignRequest $request): JsonResponse
    {
        $campaign = $this->campaignRepository->create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'target_amount' => $request->input('target_amount'),
        ]);

        return response()->json([
            'message' => 'Campaign created successfully.',
            'campaign' => $campaign,
        ], 201);
    }
}
