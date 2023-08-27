<?php

namespace App\Http\Controllers;


use App\Models\Airline;
use App\Models\Airplane;
use App\Models\AirplaneType;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::with(['airplane.type', 'source', 'destination', 'airline'])->paginate(10);
        return view('flights.index')->with(['flights' => $flights]);
    }

    public function searchFlights(Request $request)
    {

        $query = $request->get('query');

        $flights = Flight::where('departure', 'like', "%{$query}%")
            ->orWhere('arrival', 'like', "%{$query}%")
            ->orWhereHas('airline', function ($q) use ($query) {
                $q->where('airlinename', 'like', "%{$query}%");
            })
            ->with(['airline', 'airplane.type', 'source', 'destination'])
            ->get();

        return response()->json($flights);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airports = Airport::all();
        $airplanes = Airplane::with('type')->get();
        $airlines = Airline::all();
        return view('flights.create')->with(['airports' => $airports, 'airplanes' => $airplanes, 'airlines' => $airlines]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Flight::create($request->except('_token'));
        return redirect(route('flights.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('flights.edit')->with(['flight' => Flight::find($id), 'airplanes' => Airplane::all(), 'airlines' => Airline::all(), 'airports' => Airport::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);

        $flight->update($request->except('_token'));

        return redirect(route('flights.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $flight = Flight::findOrFail($id);
            $flight->delete();

            return redirect()->route('flights.index')->with('success', 'Flight deleted successfully');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('flights.index')->with('error', 'Cannot delete this flight, it is associated with another entity');
            }

            return redirect()->route('flights.index')->with('error', 'Something went wrong, please try again later');
        }
    }
}
