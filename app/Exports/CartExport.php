<?php

namespace App\Exports;

use App\Models\Cart;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Cart::all();
      $userId=Session::has('user') ? Session::get('user')['id'] : '';
      $cart = DB::select('SELECT p.name producto,u.name usuario,c.created_at FROM products p INNER JOIN cart c ON p.id=c.product_id INNER JOIN users u ON u.id=c.user_id WHERE c.user_id='.$userId);
      return collect($cart);
    }
}
