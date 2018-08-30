<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prices;

class PriceRange extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranges = Prices::all();

        return view('admin.prices.show', compact('ranges') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.prices.add' );
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

        $prices = new Prices();
        $prices->min = $data['min'];
        $prices->max = $data['max'];
        $prices->save();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $range = Prices::where('id' , $id)->first();

        return view('admin.prices.edit', ['range' => $range ] );
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

        Prices::where('id', $id)->update($data);

        return redirect()->route( 'prices.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prices::where('id' , $id)->delete();

        echo json_encode([
            'error' => 0,
        ]);
    }
}
