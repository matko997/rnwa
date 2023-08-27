<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Ariline;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlines = Airline::with('airports')->paginate(10);
        return view('airlines.index')->with(['airlines' => $airlines]);
    }

    public function search(Request $request) {
        $query = $request->input('query');

        $airlines = Airline::where('airlinename', 'LIKE', "%{$query}%")
            ->with('airports')
            ->get();

        return response()->json($airlines);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airports = Airport::all();
        return view('airlines.create')->with(['airports'=>$airports]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Airline::create($request->except('_token'));
        return redirect(route('airlines.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ariline $ariline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $airline = Airline::find($id);
        $airports = Airport::all();
        return view('airlines.edit')->with(['airline'=>$airline,'airports'=>$airports]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $airport = Airline::find($id);

        $airport->update($request->except('_token'));

        return redirect(route('airlines.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $airline = Airline::findOrFail($id);
            $airline->delete();

            return redirect()->route('airlines.index')->with('success', 'Airline deleted successfully');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('airlines.index')->with('error', 'Cannot delete this airline, it is associated with another entity');
            }

            return redirect()->route('airlines.index')->with('error', 'Something went wrong, please try again later');
        }
    }
}
