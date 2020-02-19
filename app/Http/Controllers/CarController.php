<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    const CARS_PER_PAGE = 10;

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
     * Shows the default index page if nothing is searched
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        $columns = [
            'type',
            'transmission',
            'fuel_type',
            'doors'
        ];

        /**Checks what column is sent in the request and filters the data.*/
        foreach ($columns as $column) {
            if (request()->has($column)) {
                $cars = Car::where($column, request($column))
                    ->paginate(self::CARS_PER_PAGE)
                    ->appends($column, request($column));

                return view('index')->with(['cars' => $cars]);
            }
        }

        /**Sorting by year*/
        if (request()->has('year')){
            $cars=Car::orderBy('year',request('year'))
                ->paginate(self::CARS_PER_PAGE)
                ->appends('year', request('year'));

            return view('index')->with(['cars' => $cars]);
        }

        /**Sorting by price */
        if (request()->has('price')){
            $cars=Car::orderBy('price',request('price'))
                ->paginate(self::CARS_PER_PAGE)
                ->appends('price', request('price'));

            return view('index')->with(['cars' => $cars]);
        }
        $cars = Car::paginate(self::CARS_PER_PAGE);
        return view('index')->with(['cars' => $cars]);
    }


    /**
     * Returns the create view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cars.create');
    }

    /** Gets the string from the searchbar and displays the data of what the user searched for */
    public function search(Request $request){

        $search=$request->get('keyword');
        $cars = Car::where('model', 'LIKE', '%' . $search . '%')
            ->paginate(self::CARS_PER_PAGE)
            ->appends($search, request($search));

        return view('index',['cars'=>$cars]);
    }

    /**
     * Grabs the user's input and add the new item to the database
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
     * Display the specified view
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view ('cars.show', compact ('car'));

    }

    /**
     * Show the form for editing the specified car
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view ('cars.edit', compact ('car'));
    }

    /**
     * Get the user's input and update the data of an already existing item
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
     * Delete data
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car -> delete ();
        return redirect () -> action ('CarController@index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
