<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index(): array
    {
        return Campaign::all();
    }

    public function store(Request $request): Campaign
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:campaigns|max:255',
            'description' => 'required',
        ]);

        return Campaign::create($validatedData);
    }

    public function show(int $id): Campaign
    {
        return Campaign::findOrFail($id);
    }

    public function update(Request $request, Campaign $campaign): JsonResponse
    {
        $isUpdated = $campaign->update($request->only(['title', 'description']));

        return $isUpdated
            ? $this->getSuccessResponse()
            : $this->getFailResponse();
    }

    public function destroy(int $id)
    {
        $isDeleted = Campaign::findOrFail($id)->delete();

        return $isDeleted
            ? $this->getSuccessResponse()
            : $this->getFailResponse();
    }
}
