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
    	Cart::add(['id' => $id, 'name' => $books_buy->name, 'qty' => 1, 'price' => $books_buy->price, 'options' => ['img' => $books_buy->image, 'promotion' => $books_buy->value, 'promotion_id' => $books_buy->promotion_id ]]);
    	$content = Cart::content();

    	return redirect('/cart');
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

    	return redirect('/cart');
    }
    public function update($id, Request $request)
    {
    	Cart::update($id, ['qty' => $request->quantity]);

    	return redirect('/cart');
    }
}
