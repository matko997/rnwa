<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Ariline;
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
        Airline::destroy($id);
        return redirect(route('airlines.index'));
    }
}
