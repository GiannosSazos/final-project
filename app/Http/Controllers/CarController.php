<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    const CARS_PER_PAGE = 5;

    const RULES = [
        'model' => 'required|min:3|max:64',
        'year' => 'required|min:4|max:4',
        'type' => 'required|min:2|max:256',
        'fuel_type' => 'required|min:2|max:256',
        'transmission' => 'required|min:2|max:256',
        'doors' => 'required|min:1|max:256',
        'price' => 'required|min:2|max:256',
    ];

    const MESSAGES = [
        'model.required' => 'The model is required.',
        'year.required' => 'The year cannot be empty.',
        'type.required' => 'The type is required.',
        'fuel_type.required' => 'The fuel type is required',
        'transmission.required' => 'The gearbox is required',
        'doors.required' => 'The no. of doors are required.',
        'price.required' => 'The price cannot be empty.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate (self::CARS_PER_PAGE);

        return view ('index') -> with (['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate (self::RULES, self::MESSAGES);



        Car::create ([

            'model' => $request -> input ('model'),
            'year' => $request -> input ('year'),
            'type' => $request -> input ('type'),
            'fuel_type' => $request -> input ('fuel_type'),
            'transmission' => $request -> input ('transmission'),
            'doors' => $request -> input ('doors'),
            'price' => $request -> input ('price'),

        ]);

        return redirect () -> action ('CarController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view ('cars.show', compact ('car'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view ('cars.edit', compact ('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update( Car $car, Request $request)
    {
        $request -> validate (self::RULES, self::MESSAGES);

        $car -> update (['year' => $request -> year]);
        $car -> update (['type' => $request -> type]);
        $car -> update (['fuel_type' => $request -> fuel_type]);
        $car -> update (['transmission' => $request -> transmission]);
        $car -> update (['doors' => $request -> doors]);
        $car -> update (['price' => $request -> price]);

        return redirect () -> action ('CarController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car -> delete ();
        return redirect () -> action ('CarController@index');
    }
}
