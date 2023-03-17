<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notebook;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Notebook API",
 *      description="API for managing notebooks",
 *      @OA\Contact(
 *          email="contact@notebook-api.com"
 *      ),
 *      @OA\License(
 *          name="Nginx latest",
 *          url="https://nginx.org/ru/"
 *      )
 * )
 */
class NotebookController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/notebook",
     *     summary="Get a list of notebooks",
     *     tags={"notebook"},
     *     @OA\Response(
     *         response=200,
     *         description="Return a list of notebooks"
     *     ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function index()
    {
        $notebooks = Notebook::paginate(5); // постраничный вывод
        return response()->json($notebooks);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/notebook",
     *     summary="Create a notebook",
     *     tags={"notebook"},
     *     @OA\RequestBody(
     *         description="Notebook object to be created"
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Notebook created"
     *     ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Parameter(
     *         description="Last name first name patronymic of the person",
     *         in="path",
     *         name="FIO",
     *         required=true,
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     *     @OA\Parameter(
     *         description="The company where the person works",
     *         in="path",
     *         name="company",
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     *     @OA\Parameter(
     *         description="The phone number of the person",
     *         in="path",
     *         name="phone",
     *         required=true,
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     *      @OA\Parameter(
     *         description="The email of the person",
     *         in="path",
     *         name="email",
     *         required=true,
     *         @OA\Schema(
     *             type="srting",
     *             format="email",
     *         )
     *      ),
     *     @OA\Parameter(
     *         description="The date of birth of the person",
     *         in="path",
     *         name="birthdate",
     *         @OA\Schema(
     *             type="date"
     *         )
     *      ),
     *      @OA\Parameter(
     *         description="The photo of the person",
     *         in="path",
     *         name="photo",
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     * )
     */
    public function store(Request $request)
    {
        $notebook = new Notebook;

        $notebook->FIO = $request->FIO;
        $notebook->company = $request->company;
        $notebook->phone = $request->phone;
        $notebook->email = $request->email;
        $notebook->birthdate = $request->birthdate;
        $notebook->photo = $request->photo;

        $notebook->save();

        return $notebook;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/notebook/{id}",
     *     summary="Get a specific notebook",
     *     tags={"notebook"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the notebook to get",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Return the notebook"
     *     ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function show($id)
    {
        $notebook = Notebook::find($id);
        return response()->json($notebook);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/notebook/{id}",
     *     summary="Update a specific notebook",
     *     tags={"notebook"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the notebook to update",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Notebook object to be updated"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Notebook updated"
     *     ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Parameter(
     *         description="Last name first name patronymic of the person",
     *         in="path",
     *         name="FIO",
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     *     @OA\Parameter(
     *         description="The company where the person works",
     *         in="path",
     *         name="company",
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     *     @OA\Parameter(
     *         description="The phone number of the person",
     *         in="path",
     *         name="phone",
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     *      @OA\Parameter(
     *         description="The email of the person",
     *         in="path",
     *         name="email",
     *         @OA\Schema(
     *             type="srting",
     *             format="email",
     *         )
     *      ),
     *     @OA\Parameter(
     *         description="The date of birth of the person",
     *         in="path",
     *         name="birthdate",
     *         @OA\Schema(
     *             type="date"
     *         )
     *      ),
     *      @OA\Parameter(
     *         description="The photo of the person",
     *         in="path",
     *         name="photo",
     *         @OA\Schema(
     *             type="srting"
     *         )
     *      ),
     * )
     */
    public function update(Request $request, $id)
    {
        $notebook = Notebook::find($id);

        $notebook->FIO = $request->FIO ?? $notebook->FIO;
        $notebook->company = $request->company ?? $notebook->company;
        $notebook->phone = $request->phone ?? $notebook->phone;
        $notebook->email = $request->email ?? $notebook->email;
        $notebook->birthdate = $request->birthdate ?? $notebook->birthdate;
        $notebook->photo = $request->photo ?? $notebook->photo;

        $notebook->save();

        return response()->json(['message' => 'Notebook successfully updated']);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/notebook/{id}",
     *     summary="Delete a specific notebook",
     *     tags={"notebook"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the notebook to delete",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Notebook deleted"
     *     )
     * )
     */
    public function destroy($id)
    {
        $notebook = Notebook::find($id);
        $notebook->delete();
        return response()->json(['message' => 'Notebook successfully deleted']);
    }
}
