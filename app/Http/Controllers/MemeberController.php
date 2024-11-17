<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemeberRequest;
use App\Http\Requests\UpdateMemeberRequest;
use App\Http\Resources\MemebersResource;
use App\Models\Memeber;
use App\Traits\ModelNotFoundException;


class MemeberController extends Controller
{
    use ModelNotFoundException;

    /**
     *
     * @OA\Get(
     *     path="/api/members/",
     *     tags={"members"},
     *     summary="List members",
     *     operationId="list_members",
     *     description="Returns a list members",
     *     @OA\Response(
     *         response=200,
     *         description="List of members",
     *
     *           @OA\JsonContent(
     *              @OA\Property(
     *                  property="name",
     *                  description="member Name",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="title",
     *                  description="member title",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  description="Memeber Age",
     *                  type="number",
     *                  nullable="false",
     *                  example="1"
     *              ),
     *
     *                  @OA\Property(
     *                  property="email",
     *                  description="Memeber email",
     *                  type="email",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     *
     *               @OA\Property(
     *                  property="phone numner",
     *                  description="Memeber phone number",
     *                  type="number",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function index()
    {
        return MemebersResource::collection(Memeber::query()->paginate(10));
    }


    /**
     * @OA\Schema(
     *    schema="StoreRequest",
     *              @OA\Property(
     *                  property="name",
     *                  description="member Name",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="title",
     *                  description="member title",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  description="Memeber Age",
     *                  type="number",
     *                  nullable="false",
     *                  example="1"
     *              ),
     *
     *                  @OA\Property(
     *                  property="email",
     *                  description="Memeber email",
     *                  type="email",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     *
     *               @OA\Property(
     *                  property="phone numner",
     *                  description="Memeber phone number",
     *                  type="number",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     * )
     *
     * @OA\Post(
     *     path="/api/members",
     *     tags={"members"},
     *     summary="create a member",
     *     description="crate a member ",
     *     operationId="store",
     *     @OA\RequestBody(
     *        @OA\JsonContent(ref="#/components/schemas/StoreRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Authentication successful",

     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function store(StoreMemeberRequest $request)
    {
        Memeber::create($request->validated());

        return response()->json(['success' => 'memeber created successfull']);
    }

    /**
     *
     * @OA\Get(
     *     path="/api/members/{member}",
     *     tags={"members"},
     *     summary="List one member",
     *     operationId="list_one_member",
     *      @OA\Parameter(
     *         name="member",
     *         description="member ID",
     *         in="path",
     *         required=true,
     *         example="1"
     *     ),
     *     description="Returns one note",
     *     @OA\Response(
     *         response=200,
     *         description="list on note",
     *
     *           @OA\JsonContent(
     *              @OA\Property(
     *                  property="name",
     *                  description="member Name",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="title",
     *                  description="member title",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  description="Memeber Age",
     *                  type="number",
     *                  nullable="false",
     *                  example="1"
     *              ),
     *
     *                  @OA\Property(
     *                  property="email",
     *                  description="Memeber email",
     *                  type="email",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     *
     *               @OA\Property(
     *                  property="phone numner",
     *                  description="Memeber phone number",
     *                  type="number",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function show(Memeber $member)
    {
        $this->modelNotFoundException($member);

        return new MemebersResource($member);
    }

    /**
     * @OA\Schema(
     *    schema="UpdateRequest",
     *              @OA\Property(
     *                  property="name",
     *                  description="member Name",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="title",
     *                  description="member title",
     *                  type="string",
     *                  nullable="false",
     *                  example="...."
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  description="Memeber Age",
     *                  type="number",
     *                  nullable="false",
     *                  example="1"
     *              ),
     *
     *                  @OA\Property(
     *                  property="email",
     *                  description="Memeber email",
     *                  type="email",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     *
     *               @OA\Property(
     *                  property="phone numner",
     *                  description="Memeber phone number",
     *                  type="number",
     *                  nullable="false",
     *                  example="geni@gmail.com"
     *              ),
     * )
     *
     * @OA\Put(
     *     path="/api/members/{member}",
     *     tags={"members"},
     *     summary="upate a member",
     *     description="update a member ",
     *     operationId="update_member",
     *     @OA\Parameter(
     *         name="member",
     *         description="member ID",
     *         in="path",
     *         required=true,
     *         example="1"
     *     ),
     *     @OA\RequestBody(
     *        @OA\JsonContent(ref="#/components/schemas/UpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Authentication successful",

     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
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
     * @OA\Schema(
     *    schema="DeleteRequest",
     * )
     *
     * @OA\Delete(
     *     path="/api/members/{member}",
     *     tags={"members"},
     *     summary="delete a member",
     *     description="Delete a member ",
     *     operationId="Delete_member",
     *     @OA\Parameter(
     *         name="member",
     *         description="member ID",
     *         in="path",
     *         required=true,
     *         example="1"
     *     ),
     *     @OA\RequestBody(
     *        @OA\JsonContent(ref="#/components/schemas/DeleteRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Authentication successful",

     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function destroy(Memeber $member)
    {
        $this->modelNotFoundException($member);

        $member->delete();

        return response('', 204);
    }
}
