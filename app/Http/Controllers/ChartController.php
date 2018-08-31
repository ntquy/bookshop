<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Book;
use App\Category;
use App\Order;
use DB;

class ChartController extends Controller
{
	public function cat_books($id)
	{
		$books = DB::table('books')
                    ->select('books.*')
                    ->join('category_book', 'books.id', '=', 'category_book.book_id')
                    ->join('categories', 'categories.id', '=', 'category_book.category_id')
                    ->where('categories.id', '=', $id)
                    ->get();

		return $books;
	}
    public function index()
    {
    	$category = Category::select('name', 'id')->get();
    	$sub_books = array();
    	$name = array();
    	foreach ($category as $value) {
    		array_push($name, $value->name);
    		array_push($sub_books, count($this->cat_books($value->id)));
    	}
    	
    	$order = Order::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        
    	$charts = Charts::database($order,'bar', 'highcharts')
    			->title(trans('messages.chart_books') )
    			->elementLabel(trans('messages.total_books') )
    			->dimensions(1000, 500)
    			->responsive(false)
    			->groupByMonth(date('Y'), true);

    	$category_books = Charts::create('pie', 'highcharts')
    					->title(trans('messages.cat_books') )
    					->labels($name)
    					->values($sub_books)
    					->dimensions(1000, 500)
    					->responsive(false);

    	return view('admin.chart.index', compact('charts', 'category_books'));
    }
}
