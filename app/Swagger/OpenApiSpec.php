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
 */
class OpenApiSpec {}
