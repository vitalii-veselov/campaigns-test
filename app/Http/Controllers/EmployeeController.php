<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $comments = Employee::where('id_campaign', $request->get('id_campaign', 0))
            ->orderBy('id', 'DESC')
            ->get();

        return new JsonResponse($comments);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'id_campaign' => 'required',
            'id_position' => 'required',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'salary' => 'required',
            'date_birth' => 'required',
        ]);
        Employee::create($validatedData);

        return $this->getSuccessResponse();
    }

    public function show(int $id): JsonResponse
    {
        return new JsonResponse(Employee::findOrFail($id));
    }

    public function update(Request $request, Comment $comment): JsonResponse
    {
        $comment->update($request->only([
            'id_campaign',
            'id_position',
            'first_name',
            'last_name',
            'salary',
            'date_birth',
        ]));

        return $this->getSuccessResponse();
    }

    public function destroy(int $id)
    {
        Employee::findOrFail($id)->delete();

        return $this->getSuccessResponse();
    }
}
