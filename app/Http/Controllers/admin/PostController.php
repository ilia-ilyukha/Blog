<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
use App\Models\admin\Post;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('query');

        $posts = Post::orderBy('id', 'desc')
            ->with('user:id,name')
            ->search($q)
            ->paginate(10);
        // dd($posts);
        $data['posts'] = $posts;
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
        $post->annotation = isset($request->annotation) ? $request->annotation : $this->cutString($request->body, 50);
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
        htmlentities($string, ENT_NOQUOTES, 'UTF-8');

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
        $post->body = htmlentities($request->body, ENT_NOQUOTES, 'UTF-8');

        if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('/images/blog', $filename, 'public');
            // $path1 = $request->file('image_file')->store('', 'public');
            $post->image = $path;
        }
        // else {
        //     $post->image = 'no-image.png';
        // }
        // $post->image = $request->image;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
}
