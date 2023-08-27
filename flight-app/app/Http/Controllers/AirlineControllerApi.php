<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AirlineControllerApi extends Controller
{
    public function index()
    {
        try {
            $airlines = Airline::all();
            return response()->json(['data' => $airlines], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'airlinename' => 'required',
                'iata' => 'required|string|max:2',
                'base_airport' => 'required',
            ]);

            $airline = Airline::create($request->all());
            return response()->json(['data' => $airline], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function show($id)
    {
        try {
            $airline = Airline::findOrFail($id);
            return response()->json(['data' => $airline], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Not Found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $airline = Airline::findOrFail($id);
            $airline->update($request->all());
            return response()->json(['data' => $airline], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Not Found'], 404);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $airline = Airline::findOrFail($id);
            $airline->delete();
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return response()->json(['message' => 'Cannot delete, it is associated with another entity'], 400);
            }
            return response()->json(['message' => 'Internal Server Error'], 500);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Not Found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }
}
