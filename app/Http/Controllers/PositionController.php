<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(): JsonResponse
    {
        $positions = Position::all();

        return new JsonResponse($positions);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);
        Position::create($validatedData);

        return $this->getSuccessResponse();
    }

    public function show(int $id): JsonResponse
    {
        return new JsonResponse(Position::findOrFail($id));
    }

    public function update(Request $request, Position $position): JsonResponse
    {
        $position->update($request->only(['title']));

        return $this->getSuccessResponse();
    }

    public function destroy(int $id)
    {
        Position::findOrFail($id)->delete();

        return $this->getSuccessResponse();
    }
}
