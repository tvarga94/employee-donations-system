<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequest;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class DonationController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/donations",
     *     summary="Donate to a campaign",
     *     tags={"Donations"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"campaign_id", "amount"},
     *             @OA\Property(property="campaign_id", type="integer", example=1),
     *             @OA\Property(property="amount", type="number", format="float", example=50.00)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Donation successful",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Donation successful."),
     *             @OA\Property(property="donation", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="user_id", type="integer", example=10),
     *                 @OA\Property(property="campaign_id", type="integer", example=1),
     *                 @OA\Property(property="amount", type="number", example=50.00),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-05-02T12:34:56Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-05-02T12:34:56Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreDonationRequest $request): JsonResponse
    {
        $donation = Donation::create([
            'user_id' => Auth::id(),
            'campaign_id' => $request->input('campaign_id'),
            'amount' => $request->input('amount'),
        ]);

        return response()->json([
            'message' => 'Donation successful.',
            'donation' => $donation,
        ], 201);
    }
}
