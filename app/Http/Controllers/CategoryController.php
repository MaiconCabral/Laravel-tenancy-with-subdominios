<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Tenant\ManagerTenant;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover = '';
        if($request->cover){
            $coverPath = app(ManagerTenant::class)->coverPath();
            $file = $request->cover;
            $path = $file->store($coverPath.'/category');
            $cover =  $path;
        }
        
        Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'cover' => $cover,
            'status' => $request['status'] ?? false,
        ]);

        return redirect()->route('categories.index')->with('message', 'Cadastro realizado com sucesso!');
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
            return redirect()->route('categories.index')->with('warning', 'Categoria não encontrado!');
        }

        $cat = Category::find($id);
        $cat->delete();

        return redirect()->route('categories.index')->with('message', 'Removido com sucesso!');
    }
}
