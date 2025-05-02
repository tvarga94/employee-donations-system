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

    /**
     * @OA\Post(
     *     path="/api/campaigns",
     *     operationId="createCampaign",
     *     summary="Create a new campaign",
     *     description="Allows an authenticated employee to create a new fundraising campaign.",
     *     tags={"Campaigns"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "target_amount"},
     *             @OA\Property(property="title", type="string", example="Save the Rainforest"),
     *             @OA\Property(property="description", type="string", example="Funding tree planting."),
     *             @OA\Property(property="target_amount", type="number", example=1000.00)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Campaign created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Campaign created successfully."),
     *             @OA\Property(property="campaign", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="user_id", type="integer", example=10),
     *                 @OA\Property(property="title", type="string", example="Save the Rainforest"),
     *                 @OA\Property(property="description", type="string", example="Funding tree planting."),
     *                 @OA\Property(property="target_amount", type="number", example=1000.00),
     *                 @OA\Property(property="is_active", type="boolean", example=true),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-05-02T12:34:56Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-05-02T12:34:56Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
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
