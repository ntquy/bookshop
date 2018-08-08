<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Cart;
use App\User;
use DB;

class OrderController extends Controller
{
    public function order(OrderRequest $request, $id_user)
    {
    	$content = Cart::content();
       	DB::table('orders')->insert(
    		[
    			'total_price' => Cart::total(),
    			'discount' => 0,
    			'paid' => 0,
    			'ship_address' => $request->address,
    			'phone' => $request->phone,
    			'user_id' => $id_user,
    			'coupon_id' => 0,
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
    				'book_id' => $con->id
    			]
    			);
    	}
    	Cart::destroy();

    	return redirect('/cart')->with('notify', trans('messages.success'));
    }
}
