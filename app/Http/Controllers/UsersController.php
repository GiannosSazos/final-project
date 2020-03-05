<?php

namespace App\Http\Controllers;

use App\Meats;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response;

class UsersController extends Controller
{

    const USERS_PER_PAGE = 10;

    const RULES = [

        'personal_address' => 'required',
        'personal_telephone' => 'required',
        'email' => 'required',
        'password' => 'required',



    ];

    const MESSAGES = [

        'personal_address.required' => 'The personal address is required',
        'personal_telephone.required' => 'The personal telephone is required',
        'email.required' => 'The email is required',
        'password.required' => 'The password is required',


    ];

    /**
     * Shows the default index page if nothing is searched
     *
     * @return Response
     */
    public function index()
    {
//
//        $columns = [
//            'name',
//
//        ];
//
//        /**Checks what column is sent in the request and filters the data.*/
//        foreach ($columns as $column) {
//            if (request()->has($column)) {
//                $meat = Meats::where($column, request($column))
//                    ->paginate(self::MEATS_PER_PAGE)
//                    ->appends($column, request($column));
//
//                return view('index')->with(['meat' => $meat]);
//            }
//        }
//
//
//        /**Sorting by price */
//        if (request()->has('price_per_kg')) {
//            $meat = Meats::orderBy('price_per_kg', request('price_per_kg'))
//                ->paginate(self::MEATS_PER_PAGE)
//                ->appends('price_per_kg', request('price_per_kg'));
//
//            return view('index')->with(['meat' => $meat]);
//        }
        $user= User::paginate(self::USERS_PER_PAGE);
        return view('users.index')->with(['user' => $user]);
    }


    /**
     * Returns the create view
     *
     * @return Response
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
     * @param Request $request
     * @return Response
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
     * @return Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));

    }
    public function showMe(User $user)
    {
        return view('users.show_me', compact('user'));

    }

    /**
     * Show the form for editing the specified meats
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function editMe(User $user)
    {
        return view('users.edit_me', compact('user'));
    }


    /**
     * Get the user's input and update the data of an already existing item
     *
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function update(User $user, Request $request)
    {
        $id=$user->id;
        if (password_verify($password =$request->input('password'), Auth::user () ->  password)) {
            $request->validate(self::RULES, self::MESSAGES);


            $user->update(['restaurant_name' => $request->restaurant_name]);
            $user->update(['restaurant_address' => $request->restaurant_address]);
            $user->update(['restaurant_telephone' => $request->restaurant_telephone]);
            $user->update(['personal_address' => $request->personal_address]);
            $user->update(['personal_telephone' => $request->personal_telephone]);
            $user->update(['email' => $request->email]);

            return redirect("/user/{$id}")->with('success', "{$user->name}'s details have been updated");
        }else{

            return redirect("/user/{$id}/edit")->with('failure', 'Incorrect Password');
        }

    }
    public function updateMe(User $user, Request $request)
    {
        if (password_verify($password =$request->input('password'), Auth::user () ->  password)) {
            $request->validate(self::RULES, self::MESSAGES);

            $user=User::where('id',Auth::user()->id);
            $user->update(['restaurant_name' => $request->restaurant_name]);
            $user->update(['restaurant_address' => $request->restaurant_address]);
            $user->update(['restaurant_telephone' => $request->restaurant_telephone]);
            $user->update(['personal_address' => $request->personal_address]);
            $user->update(['personal_telephone' => $request->personal_telephone]);
            $user->update(['email' => $request->email]);

            return redirect("my_profile")->with('success', 'Your details have been updated');
        }else{
            return redirect()->action('UsersController@editMe')->with('failure', 'Incorrect Password');
        }

    }

    /**
     * Delete data
     *
     * @param \App\Meat $meat
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->action('UsersController@index')->with('deleted','User ' .$user-> name.  ' has been removed');
    }

    public function destroyMe(User $user)
    {
        $user=User::where('id',Auth::user()->id);
        $user->delete();
        return redirect()->action('auth.login');
    }
    public function __construct()
    {
//        $this->middleware(['auth','verified']);
        $this->middleware('auth');
    }
}
