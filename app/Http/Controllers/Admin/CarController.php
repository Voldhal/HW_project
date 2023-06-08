<?php

namespace App\Http\Controllers\Admin;
use App\Models\Owner;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $car = new Car([
            'reg_number' => 'required|regex:/^[A-Z]{3}\s\d{3}$/',
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'owner_id' => $request->input('owner_id'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('cars', $image, $imageName);
            $car->image = $imageName;
        }

        $car->save();

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
    public function edit(Car $car)
    {
        $owners = Owner::all();

        return view('admin.cars.edit', compact('car', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        // Validate the request data
        $request->validate([
            'reg_number' => 'required|regex:/^[A-Z]{3}\s\d{3}$/',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand' => 'required',
            'model' => 'required',
            'owner_id' => 'required',
        ]);

        // Update the car details
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($car->image) {
                Storage::disk('public')->delete('cars/' . $car->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('cars', 'public');
            $car->image = basename($imagePath);
        }

        // Save the updated car details
        $car->save();

        // Redirect back to the car index page with a success message
        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->back();
    }
}
