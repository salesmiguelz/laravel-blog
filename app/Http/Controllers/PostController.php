<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required|unique:posts',
            'body' => 'required',
            'description' => 'required'
        ]);

        $img = file_get_contents($data['img']);
        $fileExtension = $request->file('img')->extension();
        $fileName = time() . '.' . $fileExtension;
        Storage::disk('public')->put($fileName, $img);


        $data['img'] = $fileName;
        $data['user_id'] = Auth::user()->id;
        Post::create($data);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post){
        $post = Post::findOrFail($post->id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'unique:posts',
        ]);
        $post = Post::find($post->id);
        $data = $request->all();
        if($request->img != null){
            Storage::disk('public')->delete($post->img);
            $img = file_get_contents($data['img']);
            $fileExtension = $request->file('img')->extension();
            $fileName = time() . '.' . $fileExtension;
            $data['img'] = $fileName;
            Storage::disk('public')->put($fileName, $img);
        } 
        $post->update($data);
        return redirect()->route('postsByUser', $post->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {  
        Storage::disk('public')->delete($post->img);
        $post->delete();
        return redirect()->back();
    }

    public function postsByUser(User $user){
        $posts = Post::where('user_id', $user->id)->get();
        return view('posts.index', compact('posts'));
    }
}
