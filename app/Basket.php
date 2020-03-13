<?php

namespace App;

use App\Meats;
use Illuminate\Http\Request;


class Basket
{
    public $basketItem = null;
    public $totalQty = 0;
    public $basketPrice = 0;

    public function __construct($oldBasket)
    {
        if ($oldBasket) {
            $this->basketItem = $oldBasket->basketItem;
            $this->totalQty = $oldBasket->totalQty;
            $this->basketPrice = $oldBasket->basketPrice;

        }
    }

    public function add($item, $id)
    {
        $meat = Meats::find($id);
        $storedItem = [$id = $meat->id, 'kg' => 0, $totalPrice='totalPrice' => 0, 'price_per_kg' => $meat->price_per_kg, 'qty' => 0, 'item' => $item];
        if ($this->basketItem) {
            if (array_key_exists($id, $this->basketItem)) {
                $storedItem = $this->basketItem[$id];
                return redirect()->action('MeatsController@index')->with('alreadyBasket', 'This item is already in the basket');
            }
        }
        $storedItem['qty']++;
        $this->basketItem[$id] = $storedItem;
        $this->totalQty++;
        $this->basketPrice+=$item->totalPrice;

    }

    public function remove($id)
    {
        $this->basketItem[$id]['qty']--;
        $this->totalQty--;
        $this->basketPrice=$this->basketPrice-$this->basketItem[$id]['totalPrice'] ;
        unset($this->basketItem[$id]);

    }

    public function increaseKg($id)
    {
        $this->basketItem[$id]['kg']++;
        $this->basketItem[$id]['totalPrice'] = $this->basketItem[$id]['kg'] * $this->basketItem[$id]['price_per_kg'];
        $add=1*$this->basketItem[$id]['price_per_kg'];
        $this->basketPrice=$this->basketPrice+$add;
    }

    public function decreaseKg($id)
    {
        if ($this->basketItem[$id]['kg'] == 0) {
            return redirect()->action('MeatsController@showBasket')->with('negativeKg', 'You can\'t go under 0 Kg');
        }
        $this->basketItem[$id]['kg']--;
        $this->basketItem[$id]['totalPrice'] = $this->basketItem[$id]['kg'] * $this->basketItem[$id]['price_per_kg'];
        $subtract=1*$this->basketItem[$id]['price_per_kg'];
        $this->basketPrice=$this->basketPrice-$subtract;
    }

}


