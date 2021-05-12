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
        return Post::all()->toArray();
        //Read
    }

//this function is to search through posts. Not using eloquent.

//Limit this to alphanumeric on the front end to prevent injection
public function search(Request $request)
{
    //get search value from the request
    $search = $request->search;

    //search in the title and description columns from the post table
    $post = Post::query()
    ->where('title', 'like', "%".$search."%")
    ->orWhere('description', 'like', "%".$search."%")
    ->get();

    //return the search view with the results compacted
    return $post;
}

    //using eloquent
    public function myposts(Request $request)
    {
        return Post::where('user_id', $request->user()->id)->get()->toArray();
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

        $post->image = $request->image;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->contact = $request->contact;
        $post->user_id = $request->user()->id;

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
        $post->image = $request->image;
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
    public function destroy(Request $request, $id)
    {
        Post::destroy($id);
        return $this->myposts($request);
    }
}
