<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_rate = DB::select("SELECT books.*, AVG(rates.star) as avgStar FROM books INNER JOIN rates ON rates.book_id = books.id GROUP BY books.name ORDER BY avgStar DESC limit 0,3");
        $book_sale = DB::table('books')
                        ->where('promotion_id', '<>', 0)
                        ->orderBy('id', 'desc')
                        ->limit(3)
                        ->get();
        $book_new = DB::table('books')->orderBy('id', 'desc')->limit(10)->get();
        
        return view('layout.home', ['books_rate' => $book_rate, 'books_sale' => $book_sale, 'books_new' => $book_new]);
    }
    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
}
