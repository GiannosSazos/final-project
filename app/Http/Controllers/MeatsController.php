<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Mail\OrderCancelled;
use App\Mail\OrderConfirmed;
use App\Mail\OrderDelivered;
use App\Meats;
use http\Exception;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Location;
use Session;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response;
use Stripe\Charge;
use Stripe\Stripe;
use App\Order;

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
     * @return Response
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
        $meat = Meats::paginate(self::MEATS_PER_PAGE);
        return view('index')->with(['meat' => $meat]);
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
            ->orWhere('cut', 'LIKE', '%' . $search . '%')
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

        return redirect()->action('MeatsController@index')->with('added', 'A new meat has been added successfully!');
    }

    /**
     * Display the specified view
     *
     * @param Meats $meat
     * @return Response
     */
    public function show(Meats $meat)
    {
        return view('meats.show', compact('meat'));

    }

    /**
     * Show the form for editing the specified meats
     *
     * @param Meats $meat
     * @return Response
     */
    public function edit(Meats $meat)
    {
        return view('meats.edit', compact('meat'));
    }

    /**
     * Get the user's input and update the data of an already existing item
     *
     * @param Request $request
     * @param Meats $meat
     * @return Response
     */
    public function update(Meats $meat, Request $request)
    {
        $request->validate(self::RULES, self::MESSAGES);

        $id = $meat->id;
        $meat->update(['kind' => $request->kind]);
        $meat->update(['cut' => $request->cut]);
        $meat->update(['price_per_kg' => $request->price_per_kg]);
        $meat->update(['description' => $request->description]);
        $meat->update(['updating_user_id' => Auth::user()->id]);

        return redirect("meat/{$id}")->with('updated', 'The details have been updated');
    }


    /**
     * Delete data
     *
     * @param \App\Meat $meat
     * @return Response
     */
    public function destroy(Meats $meat)
    {
        $meat->delete();
        return redirect()->action('MeatsController@index')->with('deleted', $meat->kind . ' ' . $meat->cut . ' has been deleted from the inventory');
    }

    public function addToBasket(Request $request, $id)
    {
        $meat = Meats::find($id);
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->add($meat, $meat->id);
        $request->session()->put('basket', $basket);
        if (session()->has('alreadyBasket')) {
            return redirect()->action('MeatsController@index');
        } else {
            return redirect()->action('MeatsController@index')->with('addBasket', $meat->kind . ' ' . $meat->cut . ' has been added to basket');
        }
    }

    public function removeFromBasket($id)
    {
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->remove($id);
        Session::put('basket', $basket);
        if ($basket->totalQty == 0) {
            return redirect()->action('MeatsController@index')->with('emptyBasket', 'Your basket is now empty');

        }
        return redirect()->action('MeatsController@showBasket')->with('removedItem', 'Item has been removed from your basket');;
    }

    public function increaseKgItem($id)
    {

        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->increaseKg($id);
        Session::put('basket', $basket);
        return redirect()->action('MeatsController@showBasket');
    }

    public function decreaseKgItem($id)
    {

        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->decreaseKg($id);
        Session::put('basket', $basket);
        return redirect()->action('MeatsController@showBasket');
    }

    public function showBasket()
    {
        if (Session::has('basket')) {
            $oldBasket = Session::get('basket');
            $basket = new Basket($oldBasket);
            if ($basket->totalQty != 0) {
                return view('basket.index', ['meats' => $basket->basketItem, 'basketPrice' => $basket->basketPrice]);
            }
        }
        return redirect()->action('MeatsController@index')->with('noItems', 'Please add something to your basket in order to access it');
    }

    public function cancelOrder(Order $order)
    {
        $order->delete();
        Mail::to($order->user->email)->send(new OrderCancelled($order));
        return redirect()->action('UsersController@index')->with('orderCancelled', 'Order of ' . $order->name . ' has been cancelled');
    }

    public function orderDelivered(Order $order)
    {
        $order->delete();
        Mail::to($order->user->email)->send(new OrderDelivered($order));
        return redirect()->action('UsersController@index')->with('orderDelivered', 'Order of ' . $order->name . ' has been delivered');
    }


    public function __construct()
    {
        $this->middleware(['auth', 'verified']);

    }

    public function checkout()
    {
        if (!Session::has('basket')) {
            return redirect()->action('MeatsController@showBasket');
        }

        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);
        $total = $basket->basketPrice;
        if ($basket->basketPrice == 0) {
            return redirect()->action('MeatsController@showBasket')->with('zeroPrice', 'You cannot checkout whilst price is £0.');
        }
        return view('basket.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('basket')) {
            return redirect()->action('MeatsController@showBasket');
        }
        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);

        Stripe::setApiKey('sk_test_cyejsvLS17VWBD1sBHEU25ky00MUQzzbu0');
        try {
            $charge = Charge::create(array(
                "amount" => $basket->basketPrice * 100,
                "currency" => "gbp",
                "source" => 'tok_visa',
                "description" => "Test Charge"
            ));
            $order = new Order();
            $order->basket = serialize($basket);
            $order->restaurant_address = $request->input('restaurant_address');
            $order->name = $request->input('name');
            $order->date = $request->input('date');
            $order->time = $request->input('time');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->action('MeatsController@checkout')->with('error', $e->getMessage());
        }

        Session::forget('basket');
        Mail::to($order->user->email)->send(new OrderConfirmed($order));
        return redirect()->action('MeatsController@index')->with('charged', 'Your order has been placed');
    }
}
