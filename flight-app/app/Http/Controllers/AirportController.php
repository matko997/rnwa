<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airports = Airport::paginate(10);
        return view('airports.index')->with(['airports' => $airports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('airports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Airport::create($request->except('_token'));
        return redirect(route('airports.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('airports.edit')->with(['airport' => Airport::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $airport = Airport::find($id);

        $airport->update($request->except('_token'));

        return redirect(route('airports.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Airport::destroy($id);
        return redirect(route('airports.index'));
    }
}
