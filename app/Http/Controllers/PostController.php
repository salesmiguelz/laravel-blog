<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        return view('posts.create', compact('post', 'categories'));
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
            'description' => 'required',
            'categories' => 'required|array'
        ]);
        $img = file_get_contents($data['img']);
        $fileExtension = $request->file('img')->extension();
        $fileName = time() . '.' . $fileExtension;
        Storage::disk('public')->put($fileName, $img);

        $data['img'] = $fileName;
        $data['user_id'] = Auth::user()->id;
        $categories = $data['categories'];
        unset($data['categories']);
        $post = Post::create($data);
        $post->categories()->attach($categories);

        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
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
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
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
        $post = Post::find($post->id);

        if($request->title != $post->title){
            $data = $request->validate([
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'title' => 'required|unique:posts',
                'body' => 'required',
                'description' => 'required',
                'categories' => 'required|array'
            ]);
        } else{
            $data = $request->validate([
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'title' => 'required',
                'body' => 'required',
                'description' => 'required',
                'categories' => 'required|array'
            ]);
        }
        if($request->img != null){
            Storage::disk('public')->delete($post->img);
            $img = file_get_contents($data['img']);
            $fileExtension = $request->file('img')->extension();
            $fileName = time() . '.' . $fileExtension;
            $data['img'] = $fileName;
            Storage::disk('public')->put($fileName, $img);
        }

        $categories = $data['categories'];
        unset($data['categories']);
        $post->categories()->sync($categories);

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
        $user_id = auth()->user()->id;
        return view('posts.index', compact('user_id'));
    }
}
