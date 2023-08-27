<?php

namespace App\Http\Controllers;


use App\Models\Flight;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FlightControllerApi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function index()
    {
        try {
            return response()->json(Flight::all(), 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'An error occurred while retrieving data.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $flight = Flight::find($id);
            if ($flight) {
                return response()->json($flight, 200);
            }
            return response()->json(['error' => 'Flight not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'An error occurred while retrieving data.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $flight = Flight::create($request->all());
            return response()->json($flight, 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'An error occurred while creating data.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $flight = Flight::findOrFail($id);
            $flight->update($request->all());
            return response()->json($flight, 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'An error occurred while updating data.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $flight = Flight::findOrFail($id);
            $flight->delete();
            return response()->json(null, 204);
        } catch (QueryException $e) {
            return response()->json(['error' => 'An error occurred while deleting data.'], 500);
        }
    }
}
