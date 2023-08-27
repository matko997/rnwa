<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airplane;
use App\Models\AirplaneType;
use App\Models\Airport;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airplanes = Airplane::with('type')->paginate(10);
        return view('airplanes.index')->with(['airplanes' => $airplanes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airplaneTypes = AirplaneType::all();
        return view('airplanes.create')->with(['airplaneTypes' => $airplaneTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Airplane::create($request->except('_token'));
        return redirect(route('airplanes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Airplane $ariplane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('airplanes.edit')->with(['airplane' => Airplane::find($id),'airplaneTypes' => AirplaneType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $airplane = Airplane::find($id);

        $airplane->update($request->except('_token'));

        return redirect(route('airplanes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $airplane = Airplane::findOrFail($id);
            $airplane->delete();

            return redirect()->route('airplanes.index')->with('success', 'airplane deleted successfully');
        } catch (QueryException $e) {
            dd($e);
            if ($e->getCode() == 23000) {
                return redirect()->route('airplanes.index')->with('error', 'Cannot delete this airplane, it is associated with another entity');
            }

            return redirect()->route('airplanes.index')->with('error', 'Something went wrong, please try again later');
        }
    }
}
