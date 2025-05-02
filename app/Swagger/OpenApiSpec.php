<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *     title="Employee Donation System API",
 *     version="1.0.0",
 *     description="API documentation for the internal donation platform."
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Local environment"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\Schema(
 *     schema="Campaign",
 *     type="object",
 *     title="Campaign",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=10),
 *     @OA\Property(property="title", type="string", example="Save the Whales"),
 *     @OA\Property(property="description", type="string", example="A campaign to support ocean conservation."),
 *     @OA\Property(property="target_amount", type="number", example=5000.00),
 *     @OA\Property(property="is_active", type="boolean", example=true),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-05-02T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-05-02T12:00:00Z")
 * )
 */
class OpenApiSpec {}
