<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Order::all();
      $userId=Session::has('user') ? Session::get('user')['id'] : '';
      $orders = DB::select('SELECT p.name producto,u.name usuario,o.payment_method,o.payment_status,o.created_at FROM products p INNER JOIN orders o ON p.id=o.product_id INNER JOIN users u ON u.id=o.user_id WHERE o.user_id='.$userId);
      return collect($orders);

    }
}
