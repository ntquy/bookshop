<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;

class BooksController extends Controller
{
    public function getBooks($id)
    {
    	$books = DB::table('books')
				->select('books.*', 'promotions.value')
				->join('promotions', 'promotions.id', '=', 'books.promotion_id')
				->where('books.id', '=', $id)
				->get();
    	$books_cat = DB::select("SELECT b1.* , promotions.value 
    							FROM books AS b1 
    							INNER JOIN promotions ON promotions.id = b1.promotion_id 
    							INNER JOIN category_book AS cb1 ON cb1.book_id = b1.id 
    							INNER JOIN categories as c0 ON c0.id = cb1.category_id WHERE c0.id
    								IN ( SELECT c2.id 
    								 	 FROM categories AS c2 
    								 	 INNER JOIN category_book as cb2 ON cb2.category_id = c2.id
    								 	 INNER JOIN books as b2 ON b2.id = cb2.book_id 
    								 	 WHERE b2.id = $id 
    								 	)
    							limit 0,10"
    							);

    	return view('layout.book_detail', ['books' => $books[0], 'books_cat' => $books_cat ]);
    }
}
