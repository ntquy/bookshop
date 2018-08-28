<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Cart;
use App\User;
use App\Order;
use DB;
use Mail;
use Auth;

class OrderController extends Controller
{
    public function order(OrderRequest $request, $id_user)
    {
    	$content = Cart::content();
        $total1 = Cart::total();
        $real_integer = filter_var($total1, FILTER_SANITIZE_NUMBER_INT);
        $total = $real_integer/100;
       	DB::table('orders')->insert(
    		[
    			'total_price' => $total,
    			'discount' => 0,
    			'paid' => 0,
    			'ship_address' => $request->address,
    			'phone' => $request->phone,
    			'user_id' => $id_user,
    			'coupon_id' => 0,
                'name_ship' => $request->name_ship,
    			'created_at' => date('Y-m-d H:m:i')
    		]
    		);
       	$id_order = DB::table('orders')->max('id');
    	foreach($content as $con)
    	{
    		DB::table('order_details')->insert(
    			[
    				'quantity' => $con->qty,
    				'order_id' =>$id_order,
    				'book_id' => $con->id,
                    'prices' => $con->price
    			]
    			);
    	}
        $data = $content;
        Mail::send('email.email', ['data' => $data ], function($messages) {
            $messages->to(Auth::user()->email, 'Artisans Web')
            ->subject('Confirm Order BookShop');
            $messages->from('quy36q@gmail.com', 'Quys');
        });
        
    	Cart::destroy();

    	return redirect('/cart')->with('notify', trans('messages.success'));

    }
    public function checkout($id_user)
    {
        $orders = Order::where('user_id', $id_user)->get();

        return view('layout.checkout', [ 'orders' => $orders ] );
    }
    public function details($order_detail_id)
    {
        $checkout = DB::table('order_details')
                    ->select('order_details.*', 'books.name')
                    ->join('books', 'books.id', '=', 'order_details.book_id')
                    ->where('order_id', $order_detail_id)
                    ->get();

        return $checkout;
    }
}
