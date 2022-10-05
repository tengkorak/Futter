<?php

namespace App\Http\Controllers;

use App\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Court::create(Input::all());
        $courts = Court::all();
        return view('courts.index',compact('courts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('courts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        
        $court = Court::create($request->all());
        return redirect()->route('courts.index');
        // return redirect()->route('admin.courts.index'); //ni ada salah
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function show(Court $court)
    {
        return view('courts.show',compact('court'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function edit(Court $court)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Court $court)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function destroy(Court $court)
    {
        //
    }
}
