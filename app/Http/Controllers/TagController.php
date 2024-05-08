<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return response($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('tags.show', [
                'tag' => $tag->id,
            ]),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return response($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return response()->noContent(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
         $tag->delete();
        return response()->noContent(204);
    }
}
