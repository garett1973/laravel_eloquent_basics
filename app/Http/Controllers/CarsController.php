<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use App\Models\Car;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Rules\Uppercase;

class CarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        $cars = Car::all();
//        $cars = Car::all()->toArray();

//        $cars = Car::all()->toJson();
//        $cars = json_decode($cars);

//        print_r(Car::where('name', 'BMW')->count());
//        print_r(Car::all()->count());
//        print_r(Car::sum('founded'));
//        print_r(Car::avg('founded'));

//        $cars = Car::where('name', 'BMW')->get();

//        $cars = Car::chunk(2, function ($cars) { // split the query into chunks of 2
//            foreach ($cars as $car) {
//                echo $car->name;
//            }
//        }

//        $cars = Car::where('name', 'Audi')
//            ->firstOrFail();

        return view('cars.index', compact('cars'));

        // return view('cars.index', [
        //     'cars' => Car::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|Factory|View
    {
        return view ('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateValidationRequest $request): RedirectResponse
    {
        $imageName = time() . '_' . $request->file('image')
                ->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);

        Car::create([
            'name' => $request->name,
            'founded' => $request->founded,
            'description' => $request->description,
            'image_path' => 'images/' . $imageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Application|Factory|View
    {
        $car = Car::find($id);
        return \view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Application|Factory|View
    {

        $car = Car::where('id', $id)->first();
        return view ('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateValidationRequest $request, string $id): RedirectResponse
    {

        Car::where('id', $id)
        ->update([
            'name' => $request->name,
            'founded' => $request->founded,
            'description' => $request->description
        ]);
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
