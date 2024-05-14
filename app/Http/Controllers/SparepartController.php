<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Http\Requests\StoreSparepartRequest;
use App\Http\Requests\UpdateSparepartRequest;
use App\Http\Resources\SparepartCollection;
use App\Http\Resources\SparepartResource;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spareparts = Sparepart::all();
        return new SparepartCollection($spareparts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSparepartRequest $request)
    {
        $data = $request->validated();
        $sparepart = Sparepart::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('spareparts.show', [
                'sparepart' => $sparepart->id,
            ]),
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sparepart $sparepart)
    {
        return new SparepartResource($sparepart);
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
