<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\testRequest;
use App\Http\Resources\TestResource;
use App\Http\Resources\UserResource;
use App\Models\testModel;
use App\Models\User;
use Illuminate\Http\Request;

// controllers is where all the function was collected
class testController extends Controller
{
    /**
     * http get /{route}
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::with("TestModel")->get());
    }

    /**
     * http post /{route}
     * Store a newly created resource in storage.
     */
    public function store(testRequest $request)
    {
        $data = $request->validated();

        $data['author_id'] = 3;

        $new_val = testModel::create($data);

        return response()->json($new_val, 201);
    }

    /**
     * http get /{route}/{id}
     * Display the specified resource.
     */
    public function show(testModel $posting)
    {

        return response()->json(new TestResource($posting), 200);
    }

    /**
     * http put/patch /{route}/{id}
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:10|min:2',
            'body' => 'required|string|min:10|max:20'
        ]);

        return response()->json($data, 201);
    }

    /**
     * http delete /{route}/{id}
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->noContent();
    }
}
