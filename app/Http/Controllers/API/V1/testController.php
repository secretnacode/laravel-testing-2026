<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\testRequest;
use App\Http\Resources\TestResource;
use App\Http\Resources\UserResource;
use App\Models\testModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

// controllers is where all the function was collected
class testController extends Controller
{
    /**
     * http get /{route}
     * Display a listing of the resource.
     */
    public function index()
    {
        // return TestResource::collection(request()->user()->TestModel()->get());
        return request()->user()->tokens;
    }

    /**
     * http post /{route}
     * Store a newly created resource in storage.
     */
    public function store(testRequest $request)
    {

        $data = $request->validated();

        $data['author_id'] = $request->user()->id;

        $new_val = testModel::create($data);

        return response()->json($new_val, 201);
    }

    /**
     * http get /{route}/{id}
     * Display the specified resource.
     */
    public function show(testModel $post)
    {
        try {
            abort_if(Auth::id() != $post->author_id, 403, 'hawow');

            return response()->json(new TestResource($post));
        } catch (\Throwable $th) {
            return response()->json(["message" => "error occured", "cause" => $th]);
        }
    }

    /**
     * http put/patch /{route}/{id}
     * Update the specified resource in storage.
     */
    public function update(testRequest $request, testModel $post)
    {
        abort_if(Auth::id() != $post->author_id, 403, 'hawow');

        $data = $request->validated();

        $post->update($data);

        return response()->json($data, 201);
    }

    /**
     * http delete /{route}/{id}
     * Remove the specified resource from storage.
     */
    public function destroy(testModel $post)
    {
        abort_if(Auth::id() != $post->author_id, 403, 'hawow');

        $post->delete();

        return response()->json(["message" => "Successfully Deleted"], 200);
    }
}
