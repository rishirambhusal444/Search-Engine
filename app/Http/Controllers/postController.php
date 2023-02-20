<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Image;
use DB;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ProductController.php
        $image       = $request->file('image');
        $filename    = $image->getClientOriginalName();

        //Fullsize
        $image->move(public_path().'/full/',$filename);

        $image_resize = Image::make(public_path().'/full/'.$filename);
        $image_resize->fit(300, 300);
        $image_resize->save(public_path('images/' .$filename));

        $product= new post();
        $product->Post = $request->post;
        $product->Image = $filename;
        $product->save();

        return back()->with('home', 'Your product saved with image!!!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
