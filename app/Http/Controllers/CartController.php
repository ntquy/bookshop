<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Book;

class CartController extends Controller
{
    public function getCart($id)
    {
    	$books = DB::table('books')
	                ->select('books.*', 'promotions.value')
	                ->join('promotions', 'promotions.id', '=', 'books.promotion_id')
	                ->where('books.id', '=', $id)
	                ->get();
        $books_buy = $books[0];
        $price=0;
        if($books_buy->value > 0)
        {
        	$price = ( ($books_buy->price) * (100 - $books_buy->value)) / 100;
        } else {
        	$price = $books_buy->price;
        }

    	Cart::add( ['id' => $id, 'name' => $books_buy->name, 'qty' => 1, 'price' => $price, 'options' => ['img' => $books_buy->image ]] );
    	$content = Cart::content();

    	return redirect( '/cart' );
    }
    public function cart()
    {
    	$content = Cart::content();
 		$total = Cart::total();

    	return view('layout.cart', ['content' => $content, 'total' => $total ] );
    }
    public function remove($id)
    {
    	Cart::remove($id);

    	return redirect( '/cart' );
    }
    public function update($id, Request $request)
    {
    	Cart::update($id, ['qty' => $request->quantity] );

    	return redirect( '/cart' );
    }
}
