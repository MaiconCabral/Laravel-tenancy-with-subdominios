<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Tenant\ManagerTenant;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tenant = $manager->tenant();
        // $posts = Post::where('tenant_id', $tenant->id)->get();

        $posts = Post::get();
       

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $post = Post::create($request->all());
        
        $cover = '';
        if($request->cover){
            $coverPath = app(ManagerTenant::class)->coverPath();
            $file = $request->cover;
            $path = $file->store($coverPath.'/post');
            $cover =  $path;
        }
        
        auth()->user()->posts()->create([
            'category_id' => $request['category'],
            'title' => $request['title'],
            'body' => $request['body'],
            'cover' => $cover,
        ]);

        return redirect()->route('posts.index')->with('message', 'Cadastro realizado com sucesso!');
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
        if(empty($id)){
            return redirect()->route('posts.index')->with('warning', 'Post não encontrado!');
        }

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Removido com sucesso!');
    
    }
}
