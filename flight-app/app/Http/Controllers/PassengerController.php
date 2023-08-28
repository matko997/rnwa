<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::paginate(10);
        return view('passengers.index', compact('passengers'));
    }

    public function create()
    {
        return view('passengers.create');
    }

    public function store(Request $request)
    {
        Passenger::create($request->except('_token'));
        return redirect(route('passengers.index'));
    }

    public function edit($id)
    {
        $passenger = Passenger::find($id);
        return view('passengers.edit', compact('passenger'));
    }

    public function update(Request $request, $id)
    {
        $passenger = Passenger::find($id);
        $passenger->update($request->except('_token'));
        return redirect(route('passengers.index'));
    }

    public function destroy($id)
    {
        Passenger::destroy($id);
        return redirect(route('passengers.index'));
    }
}
