<?php

namespace App\Http\Controllers;

use App\Meats;
use Illuminate\Http\Request;
use Auth;

class MeatsController extends Controller
{

    const MEATS_PER_PAGE = 10;

    const RULES = [
        'kind' => 'required',
        'cut' => 'required',
        'price_per_kg' => 'required',


    ];

    const MESSAGES = [
        'kind.required' => 'The type is required.',
        'cut.required' => 'The cut cannot be empty.',
        'price_per_kg.required' => 'The price is required.',

    ];

    /**
     * Shows the default index page if nothing is searched
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $columns = [
            'kind',

        ];

        /**Checks what column is sent in the request and filters the data.*/
        foreach ($columns as $column) {
            if (request()->has($column)) {
                $meats = Meats::where($column, request($column))
                    ->paginate(self::MEATS_PER_PAGE)
                    ->appends($column, request($column));

                return view('index')->with(['meats' => $meats]);
            }
        }


        /**Sorting by price */
        if (request()->has('price_per_kg')) {
            $meats = Meats::orderBy('price_per_kg', request('price_per_kg'))
                ->paginate(self::MEATS_PER_PAGE)
                ->appends('price_per_kg', request('price_per_kg'));

            return view('index')->with(['meats' => $meats]);
        }
        $meats= Meats::paginate(self::MEATS_PER_PAGE);
        return view('index')->with(['meats' => $meats]);
    }


    /**
     * Returns the create view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meats.create');
    }

    /** Gets the string from the searchbar and displays the data of what the user searched for */
    public function search(Request $request)
    {

        $search = $request->get('keyword');
        $meats = Meats::where('kind', 'LIKE', '%' . $search . '%')
            ->paginate(self::MEATS_PER_PAGE)
            ->appends($search, request($search));

        return view('index', ['meats' => $meats]);
    }

    /**
     * Grabs the user's input and add the new item to the database
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(self::RULES, self::MESSAGES);


        Meats::create([

            'kind' => $request->input('kind'),
            'cut' => $request->input('cut'),
            'price_per_kg' => $request->input('price_per_kg'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id,


        ]);

        return redirect()->action('MeatsController@index');
    }

    /**
     * Display the specified view
     *
     * @param \App\Meats $meats
     * @return \Illuminate\Http\Response
     */
    public function show(Meats $meats)
    {
        return view('meats.show', compact('meats'));

    }

    /**
     * Show the form for editing the specified meats
     *
     * @param \App\Meats $meats
     * @return \Illuminate\Http\Response
     */
    public function edit(Meats $meats)
    {
        return view('meats.edit', compact('meats'));
    }

    /**
     * Get the user's input and update the data of an already existing item
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Meats $meats
     * @return \Illuminate\Http\Response
     */
    public function update(Meats $meats, Request $request)
    {
        $request->validate(self::RULES, self::MESSAGES);

        $meats->update(['year' => $request->year]);
        $meats->update(['type' => $request->type]);
        $meats->update(['fuel_type' => $request->fuel_type]);
        $meats->update(['transmission' => $request->transmission]);
        $meats->update(['doors' => $request->doors]);
        $meats->update(['price' => $request->price]);
        $meats->update(['updating_user_id' => Auth::user()->id]);

        return redirect()->action('MeatsController@index');
    }

    /**
     * Delete data
     *
     * @param \App\Meat $meat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meats $meats)
    {
        $meats->delete();
        return redirect()->action('MeatsController@index');
    }
    public function __construct()
    {
//        $this->middleware(['auth','verified']);
        $this->middleware('auth');
    }
}
