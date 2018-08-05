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
                        ->select('books.*', 'promotions.value')
                        ->join('promotions', 'promotions.id', '=', 'books.promotion_id')
                        ->where('promotion_id', '<>', 1)
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
    public function getSearch(Request $request)
    {
        $result = DB::table('books')
                    ->select('books.*', 'promotions.value')
                    ->join('promotions', 'promotions.id', '=', 'books.promotion_id')
                    ->where('name', 'like', '%'.$request->key.'%')
                    ->orWhere('author', 'like', '%'.$request->key.'%')
                    ->paginate(9);

        return view('layout.search', compact('result'));
    }
}
