<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;

class SaleController extends Controller
{
    public function index()
    {
    	$books_sale = DB::table('books')
					->select('books.*', 'promotions.value')
					->join('promotions', 'promotions.id', '=', 'books.promotion_id')
                    ->where('promotion_id', '<>', 0)
                    ->orderBy('id', 'desc')
                    ->paginate(9);

        return view('sale.index', compact('books_sale') );
    }
}
