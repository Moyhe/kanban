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
     * Display a listing of the resource.
     */
    public function index()
    {
        return MemebersResource::collection(Memeber::query()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemeberRequest $request)
    {
        Memeber::create($request->validated());

        return response()->json(['success' => 'memeber created successfull']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Memeber $member)
    {
        $this->modelNotFoundException($member);

        return new MemebersResource($member);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemeberRequest $request, Memeber $member)
    {
        $this->modelNotFoundException($member);

        $member->update($request->validated());

        return new MemebersResource($member);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memeber $member)
    {
        $this->modelNotFoundException($member);

        $member->delete();

        return response('', 201);
    }
}
