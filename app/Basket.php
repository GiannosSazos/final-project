<?php

namespace App;

use App\Meats;

class Basket
{
    public $basketItem = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldBasket)
    {

        if ($oldBasket) {
            $this->basketItem = $oldBasket->basketItem;
            $this->totalQty = $oldBasket->totalQty;
            $this->totalPrice = $oldBasket->totalPrice;

        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->basketItem) {
            if (array_key_exists($id, $this->basketItem)) {
                $storedItem = $this->basketItem[$id];
            }
        }
        $storedItem['qty']++;
        $this->basketItem[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice+= $item->price;
    }
}


