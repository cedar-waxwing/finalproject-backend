<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Posting::all();
      //Read
    }

  
      public function show($id)
    {
        return Posting::find($id);
        //Read, individual posting
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $posting = new Posting();
      
        $posting->title = $request->title;
        $posting->description = $request->description;
        $posting->price = $request->price;
        $posting->contact = $request->contact;
      
    $posting->save(); //Create
    return $posting->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $posting = Posting::find($id);
    
    // takes in user input -- prevents error when you change just one item 
    $posting->title = $request->title;
    $posting->description = $request->description;
    $posting->price = $request->price;
    $posting->contact = $request->contact;
   
    $posting->save(); //Update
    return $posting->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        Posting::find($id)->delete();
      return "Successfully deleted.";
    }
}
