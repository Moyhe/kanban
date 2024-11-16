<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Memeber",
 *     type="object",
 *     required={"name", "title", "age", "email", "mobile_number"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="title", type="string", example="Mr."),
 *     @OA\Property(property="age", type="integer", example=30),
 *     @OA\Property(property="email", type="string", example="johndoe@example.com"),
 *     @OA\Property(property="mobile_number", type="string", example="1234567890"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-16T12:34:56Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-16T12:34:56Z")
 * )
 */
class Memeber extends Model
{
    //
}
