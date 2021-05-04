<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
      //Read
    }


      public function show($id)
    {
        return Post::find($id);
        //Read, individual post
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->contact = $request->contact;

    $post->save(); //Create
    return $post->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $post = Post::find($id);

    // takes in user input -- prevents error when you change just one item
    $post->title = $request->title;
    $post->description = $request->description;
    $post->price = $request->price;
    $post->contact = $request->contact;

    $post->save(); //Update
    return $post->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
      return "Successfully deleted post " .$id;
    }
}
