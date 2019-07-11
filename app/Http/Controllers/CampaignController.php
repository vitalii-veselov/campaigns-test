<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
{
    public function index(): JsonResponse
    {
        $campaigns = Campaign::all();

        return new JsonResponse($campaigns);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:campaigns|max:255',
            'description' => 'required',
        ]);
        Campaign::create($validatedData);

        return $this->getSuccessResponse();
    }

    public function show(int $id): JsonResponse
    {
        return new JsonResponse(Campaign::findOrFail($id));
    }

    public function update(Request $request, Campaign $campaign): JsonResponse
    {
        $campaign->update($request->only(['title', 'description']));

        return $this->getSuccessResponse();
    }

    public function destroy(int $id)
    {
        Campaign::findOrFail($id)->delete();

        return $this->getSuccessResponse();
    }
}
