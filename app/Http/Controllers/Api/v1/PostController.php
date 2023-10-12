<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\V1\PostFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\PostCollection;
use App\Http\Resources\Api\v1\PostResource;
use Illuminate\Http\Request;
use App\Models\admin\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new PostFilter();
        $filterItems = $filter->transform($request);

        // $includeUsers = $request->query('include');
        // $posts = Post::where($filterItems);
        
        // if($includeUsers){
        //     $users
        // }
        // $posts->paginate();

        if(count($filterItems) == 0){
            return new PostCollection(Post::paginate(10));
        }else{
            $posts = Post::where($filterItems)->paginate();
            return new PostCollection($posts->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return new PostResource($post);
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
