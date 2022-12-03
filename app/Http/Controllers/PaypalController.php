<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use DB;


class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {   
        Session::put('address', $request->address);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "reference_id" => 1,
                        "currency_code" => "MXN",
                        "value" => $request->total,
                    ],
                ]
            ]
        ]);
         
        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') { 
                   return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('message', 'Algo salió mal.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('message', $response['message'] ?? 'Algo salió mal.');
        }
       
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
    	$order='';
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
     
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $userId=Session::has('user') ? Session::get('user')['id'] : '';
            $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="Pendiente";
             $order->payment_method="Paypal";
             $order->payment_status="Completado";
             $order->address=Session::get('address');
             $order->save();
             Cart::where('user_id',$userId)->delete();
         }
         $request->input();
            
           return redirect('/myorders')->with(['message'=> 'Transacción completada.']);;
                
        } else {
           // return redirect('/')->with('message', $response['message'] ?? 'Algo salió mal.');
        }

    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect('/')->with('message', $response['message'] ?? 'Algo salió mal.');
    }
}