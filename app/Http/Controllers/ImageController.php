<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageCollection;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return new ImageCollection($images);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $data = $request->validated();
        $image = Image::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('images.show', [
                'image' => $image->id,
            ]),
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return response($image);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $data = $request->validated();
        $image->update($data);
        return response()->noContent(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->delete();
        return response()->noContent(204);
    }
}
