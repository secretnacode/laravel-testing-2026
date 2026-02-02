<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'this is a index function and is returning all the value in version 1';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'this is a store function and is storing a new value in version 1';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "this is a show function and showing the value of user $id in version 1";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "this is a update function and is updating a value of user $id in version 1";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "this is a destroy function and is destroying/deleting the user $id in version 1";
    }
}
