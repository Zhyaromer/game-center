<?php

namespace App\Http\Controllers;

use App\Models\station;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreStationValidation;

class StationController extends Controller
{
    public function index()
    {
        $stations = station::all();
        return view('admin.stations.index', compact('stations'));
    }

    public function create()
    {
        return view('admin.stations.form');
    }

    public function store(StoreStationValidation $request)
    {
        station::create($request->validated());
        return redirect(route('admin.stations.index', absolute: false));
    }

    public function show(string $id)
    {
        $stations = station::findOrFail($id);
        return view('admin.stations.show', compact('stations'));
    }

    public function edit(string $id)
    {
        $stations = station::findOrFail($id);
        return view('admin.stations.form', compact('stations'));
    }

    public function update(StoreStationValidation $request, string $id)
    {
        if ($request->password) {
            $station = station::findOrFail($id);
            $station->update($request->validated());
        }

        $station = station::findOrFail($id);
        $station->update(Arr::except($request->validated(), 'password'));

        return redirect()->route('admin.stations.index')->with('message', 'station updated successfully');
    }

    public function destroy(string $id)
    {
        $station = station::findOrFail($id);
        $station->delete();
        return redirect()->route('admin.stations.index')->with('message', 'station deleted successfully');
    }
}
