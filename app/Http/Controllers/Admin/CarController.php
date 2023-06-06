<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $sortField = $request->query('sort', 'id');
    $sortDirection = $request->query('direction', 'asc');

    $cars = Car::with('owner')
        ->orderBy($sortField, $sortDirection)
        ->get();

    return view('admin.cars.index', compact('cars'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create($owner_id)
    {   
        return view('admin.cars.create', compact('owner_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = Car::create($request->all());

        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the specific car by ID
        $car = Car::findOrFail($id);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);

        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
