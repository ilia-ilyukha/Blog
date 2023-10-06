<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\Post;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::all();
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['authors'] = User::all();

        return view('admin.posts.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $post = new Post();

        $post->title = $request->title;
        $post->published = $request->published;
        $post->annotation = $this->cutString(htmlentities($request->body, ENT_NOQUOTES, 'UTF-8'), 50);
        $post->user_id = $request->user_id;
        $post->created_at = date('Y-m-d');
        $post->body = htmlentities($request->body, ENT_NOQUOTES, 'UTF-8');
        $post->image = $request->image;

        $post->save();

        
        return redirect()->route('posts.index');
        // return redirect()->back()->withSuccess('Статья была успешно добавлена!');
    }

    public function cutString($string, $maxlen)
    {
        $string = str_replace("\n", "", $string);
        $len = (mb_strlen($string) > $maxlen) ? mb_strripos(mb_substr($string, 0, $maxlen), ' ') : $maxlen;
        $cutStr = mb_substr($string, 0, $len);

        return (mb_strlen($string) > $maxlen) ? $cutStr . ' ...' : $cutStr;
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
    public function edit(Post $post)
    {
        $post['body'] = html_entity_decode($post['body']);
        $post['annotation'] = html_entity_decode($post['annotation']);
        $author = User::find($post['user_id']);
        $authors = User::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'authors'  => $authors
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->published = $request->published;
        $post->annotation = $request->annotation;
        $post->user_id = $request->author;
        $post->created_at = date('Y-m-d');
        $post->body = $request->body;
        $post->image = $request->image;
        $post->save();

        return redirect()->back()->withSuccess('Article has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->withSuccess('Article has been delete!');
    }
}
