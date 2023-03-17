<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Notebook",
 *     required={
 *         "FIO",
 *         "phone",
 *         "email"
 *     },
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The ID of the notebook"
 *     ),
 *     @OA\Property(
 *         property="FIO",
 *         type="string",
 *         description="Last name first name patronymic of the person"
 *     ),
 *     @OA\Property(
 *         property="company",
 *         type="string",
 *         description="The company where the person works"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="The phone number of the person"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="The email of the person"
 *     ),
 *     @OA\Property(
 *         property="birthdate",
 *         type="date",
 *         description="The date of birth of the person"
 *     ),
 *     @OA\Property(
 *         property="photo",
 *         type="string",
 *         description="The photo of the person"
 *     )
 * )
 */
class Notebook extends Model
{
    use HasFactory;


}
