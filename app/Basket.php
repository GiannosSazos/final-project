<?php

namespace App;

use App\Meats;


class Basket
{
    public $basketItem=null;
    public $totalQty = 0;
    public function __construct($oldBasket)
    {
        if ($oldBasket) {
            $this->basketItem = $oldBasket->basketItem;
            $this->totalQty = $oldBasket->totalQty;

        }
    }
    public function add($item, $id)
    {
        $meat=Meats::find($id);
        $storedItem = [$id=$meat->id,'qty' => 0,  'item' => $item];
        if ($this->basketItem) {
            if (array_key_exists($id, $this->basketItem)) {
                $storedItem = $this->basketItem[$id];
            }
        }
        $storedItem['qty']++;
        $this->basketItem[$id] = $storedItem;
        $this->totalQty++;

    }
}


