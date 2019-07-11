<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Comment;

class CommentController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $comments = Comment::where('id_campaign_to', $request->get('id_campaign_to', 0))
            ->orderBy('id', 'DESC')
            ->get();

        return new JsonResponse($comments);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'id_campaign_from' => 'required',
            'id_campaign_to' => 'required',
            'text' => 'required|max:255',
        ]);
        Comment::create($validatedData);

        return $this->getSuccessResponse();
    }

    public function show(int $id): JsonResponse
    {
        return new JsonResponse(Comment::findOrFail($id));
    }

    public function update(Request $request, Comment $comment): JsonResponse
    {
        $comment->update($request->only(['text']));

        return $this->getSuccessResponse();
    }

    public function destroy(int $id)
    {
        Comment::findOrFail($id)->delete();

        return $this->getSuccessResponse();
    }
}
