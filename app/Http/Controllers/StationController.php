<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreStation;
use App\Http\Requests\UpdateStation;
use App\Station;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StationController extends Controller
{
    /**
     * Display all resources.
     */
    public function index(): JsonResponse
    {
        $stations = Station::all();

        return response()->json([$stations], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreStation $request
     */
    public function store(StoreStation $request): JsonResponse
    {
        Station::create($request->validated());

        return response()->json(['message' => 'Station created succesfully'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param App\Station $station
     */
    public function show(Station $station): JsonResponse
    {
        return response()->json($station, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\UpdateStation $request
     */
    public function update(UpdateStation $request, Station $station): JsonResponse
    {
        $station->update($request->validated());

        return response()->json(['message' => 'Station updated succesfully'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Station $station
     */
    public function destroy(Station $station): JsonResponse
    {
        $station->delete();

        return response()->json(['message' => 'Station deleted successfully'], Response::HTTP_OK);
    }
}
