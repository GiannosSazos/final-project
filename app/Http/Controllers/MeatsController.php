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
        'price_per_kg' => 'required|numeric',



    ];

    const MESSAGES = [
        'kind.required' => 'The type is required',
        'cut.required' => 'The cut cannot be empty',
        'price_per_kg.required' => 'The price is required',
        'price_per_kg.integer' => 'The price must be a number',
        'kind.required' => 'The type is required',


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
                $meat = Meats::where($column, request($column))
                    ->paginate(self::MEATS_PER_PAGE)
                    ->appends($column, request($column));

                return view('index')->with(['meat' => $meat]);
            }
        }


        /**Sorting by price */
        if (request()->has('price_per_kg')) {
            $meat = Meats::orderBy('price_per_kg', request('price_per_kg'))
                ->paginate(self::MEATS_PER_PAGE)
                ->appends('price_per_kg', request('price_per_kg'));

            return view('index')->with(['meat' => $meat]);
        }
        $meat= Meats::paginate(self::MEATS_PER_PAGE);
        return view('index')->with(['meat' => $meat]);
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
        $meat = Meats::where('kind', 'LIKE', '%' . $search . '%')
            ->orWhere('cut','LIKE','%'.$search.'%')
            ->paginate(self::MEATS_PER_PAGE)
            ->appends($search, request($search));

        return view('index', ['meat' => $meat]);
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
     * @param \App\Meats $meat
     * @return \Illuminate\Http\Response
     */
    public function show(Meats $meat)
    {
        return view('meats.show', compact('meat'));

    }

    /**
     * Show the form for editing the specified meats
     *
     * @param \App\Meats $meat
     * @return \Illuminate\Http\Response
     */
    public function edit(Meats $meat)
    {
        return view('meats.edit', compact('meat'));
    }

    /**
     * Get the user's input and update the data of an already existing item
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Meats $meat
     * @return \Illuminate\Http\Response
     */
    public function update(Meats $meat, Request $request)
    {
        $request->validate(self::RULES, self::MESSAGES);


        $meat->update(['kind' => $request->kind]);
        $meat->update(['cut' => $request->cut]);
        $meat->update(['price_per_kg' => $request->price_per_kg]);
        $meat->update(['description' => $request->description]);
        $meat->update(['updating_user_id' => Auth::user()->id]);

        return redirect()->action('MeatsController@index');
    }

    /**
     * Delete data
     *
     * @param \App\Meat $meat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meats $meat)
    {
        $meat->delete();
        return redirect()->action('MeatsController@index');
    }
    public function __construct()
    {
//        $this->middleware(['auth','verified']);
        $this->middleware('auth');
    }
}