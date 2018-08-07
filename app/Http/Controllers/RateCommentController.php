<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RateCommentController extends Controller
{
    public function rateComment($id_book, $id_user, Request $request)
    {
    	if($request->comment != null)
    	{
    		DB::table('comments')->insert(
    			[
	    			'content' => $request->comment,
	    			'parent_id' => 1,
	    			'user_id' => $id_user,
	    			'book_id' => $id_book
    			]
    			);
    	}
    	if($request->optionsRadios != null)
    	{
    		DB::table('rates')->insert(
    			[
    				'star' => $request->optionsRadios,
    				'user_id' => $id_user,
	    			'book_id' => $id_book
    			]
    			);
    	}

    	return redirect("/book-detail/$id_book");
    }
}
