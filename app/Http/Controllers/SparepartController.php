<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Http\Requests\StoreSparepartRequest;
use App\Http\Requests\UpdateSparepartRequest;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Sparepart::all();
        return response($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSparepartRequest $request)
    {
        $data = $request->validated();
        $product = Sparepart::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('spareparts.show', [
                'sparepart' => $product->id,
            ]),
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sparepart $sparepart)
    {
        return response($sparepart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSparepartRequest $request, Sparepart $sparepart)
    {
        $data = $request->validated();
        $sparepart->update($data);
        return response()->noContent(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sparepart $sparepart)
    {
        $sparepart->delete();
        return response()->noContent(204);
    }
}
