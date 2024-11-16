<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemeberRequest;
use App\Http\Requests\UpdateMemeberRequest;
use App\Http\Resources\MemebersResource;
use App\Models\Memeber;
use App\Traits\ModelNotFoundException;


/**
 * @OA\Info(title="Member Management API", version="1.0")
 * @OA\Tag(name="Members", description="API Endpoints for Managing Members")
 */
class MemeberController extends Controller
{

    use ModelNotFoundException;
    /**
     * @OA\Get(
     *     path="/api/members",
     *     tags={"Members"},
     *     summary="Get a list of members",
     *     description="Returns a paginated list of members",
     *     @OA\Response(
     *         response=200,
     *         description="A list of members",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Memeber")),
     *             @OA\Property(property="links", type="object"),
     *             @OA\Property(property="meta", type="object")
     *         )
     *     )
     * )
     */

    public function index()
    {
        return MemebersResource::collection(Memeber::query()->paginate(10));
    }

    /**
     * @OA\Post(
     *     path="/api/members",
     *     tags={"Members"},
     *     summary="Create a new member",
     *     description="Creates a new member",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreMemeberRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Member created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Memeber")
     *     )
     * )
     */
    public function store(StoreMemeberRequest $request)
    {
        Memeber::create($request->validated());

        return response()->json(['success' => 'memeber created successfull']);
    }

    /**
     * @OA\Get(
     *     path="/api/members/{id}",
     *     tags={"Members"},
     *     summary="Get a member",
     *     description="Returns a specific member by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the member",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Member details",
     *         @OA\JsonContent(ref="#/components/schemas/Memeber")
     *     )
     * )
     */
    public function show(Memeber $member)
    {
        $this->modelNotFoundException($member);

        return new MemebersResource($member);
    }

    /**
     * @OA\Put(
     *     path="/api/members/{id}",
     *     tags={"Members"},
     *     summary="Update a member",
     *     description="Updates an existing member",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the member",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateMemeberRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Member updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Memeber")
     *     )
     * )
     */
    public function update(UpdateMemeberRequest $request, Memeber $member)
    {
        $this->modelNotFoundException($member);

        $member->update($request->validated());

        return new MemebersResource($member);
    }

    /**
     * @OA\Delete(
     *     path="/api/members/{id}",
     *     tags={"Members"},
     *     summary="Delete a member",
     *     description="Deletes a member by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the member",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Member deleted successfully"
     *     )
     * )
     */
    public function destroy(Memeber $member)
    {
        $this->modelNotFoundException($member);

        $member->delete();

        return response('', 201);
    }
}
