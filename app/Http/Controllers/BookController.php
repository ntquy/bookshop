<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Promotion;
use App\Publisher;
use App\Category;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('admin.book.show', compact('books') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $promotions = Promotion::all();

        $publishers = Publisher::all();

        $category_list = array();

        $promotion_list = array();

        $publisher_list = array();

        foreach ($categories as $category)
        {
            $category_list[$category->id] = $category->name;
        }

        foreach ($promotions as $promotion)
        {
            $promotion_list[$promotion->id] = $promotion->value . '%';
        }

        foreach ($publishers as $publishser)
        {
            $publisher_list[$publishser->id] = $publishser->name;
        }

        return view('admin.book.add' , compact('category_list', 'promotion_list' , 'publisher_list') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $book = new Book();

        $book->name = $data['name'];

        $book->quantity = $data['quantity'];

        $book->author = $data['author'];

        $book->content = $data['content'];

        $book->summary = $data['summary'];

        $book->price = $data['price'];

        $book->promotion_id = $data['promotion'];

        $book->publisher_id = $data['publisher'];
        
        $book->image = explode('/', $request->file('image')->store('public') )[1];

        $book->save();

        $id = $book->id;

        foreach ($data['category'] as $category_id){
            DB::table('category_book')->insert([
                'category_id' => $category_id,
                'book_id' => $id,
            ]);
        }

        echo json_encode([
            'error' => 0,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('id' , $id)->first();

        $categories = Category::all();

        $promotions = Promotion::all();

        $publishers = Publisher::all();

        $category_list = array();

        $promotion_list = array();

        $publisher_list = array();

        $cat_selected = array();

        foreach ($categories as $category)
        {
            $category_list[$category->id] = $category->name;
        }

        foreach ($promotions as $promotion)
        {
            $promotion_list[$promotion->id] = $promotion->value . '%';
        }

        foreach ($publishers as $publishser)
        {
            $publisher_list[$publishser->id] = $publishser->name;
        }

        return view('admin.book.edit', compact('category_list', 'promotion_list', 'publisher_list', 'book') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        unset($data['_token']);

        unset($data['_method']);

        unset($data['image']);

        $categories = $data['category'];

        unset($data['category']);

        DB::table('category_book')->where('category_id', $id)->delete();

        foreach ($categories as $category)
        {
            DB::table('category_book')->insert([
                'category_id' => $category,
                'book_id' => $id,
            ]);
        }

        if($request->hasFile('image'))
        {
            $data['image'] = explode('/', $request->file('image')->store('public'))[1];
        }

        Book::where('id', $id)->update($data);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id' , $id)->delete();

        echo json_encode([
            'error' => 0,
        ]);
    }
}
