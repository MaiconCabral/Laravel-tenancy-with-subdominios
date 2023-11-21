<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Tenant\ManagerTenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tenants = Tenant::get();
        // dd($tenants);
        return view('tenants.index', compact('tenants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('tenants.create');
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

        if(empty($request->name) || empty($request->subdomain)){
            return redirect()->route('tenant.create')->with('warning', 'Preencha todos os campos!');
        }

        $logo = '';
        if($request->logo){
            $coverPath = app(ManagerTenant::class)->coverPath();
            $file = $request->logo;
            $path = $file->store($coverPath.'/logo');
            $logo =  $path;
        }

        Tenant::create([
            'name' => $request['name'],
            'subdomain' => $request['subdomain'],
            'color' => $request['color'],
            'status' => $request['status'] ?? false,
            'logo' => $logo ?? null,
        ]);
        
        return redirect()->route('tenant.index')->with('message', 'Cadastro realizado com sucesso!');
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
        $tenant = Tenant::find($id);
        // dd($tenants);
        return view('tenants.edit', compact('tenant'));
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
        if(empty($request->name) || empty($request->subdomain)){
            return redirect()->route('tenant.edit', ['id' => $id])->with('warning', 'Preencha todos os campos!');
        }

        $tenant = Tenant::find($id);

        if($request->logo){
            $coverPath = app(ManagerTenant::class)->coverPath();
            $file = $request->logo;
            $path = $file->store($coverPath.'/logo');
            // $cover =  $path;
            $tenant->logo =  $path;
        }

        $tenant->name = $request->name;
        $tenant->subdomain = $request->subdomain;
        $tenant->color = $request->color;
        // $tenant->subdomain = $request->subdomain;
        $tenant->status = $request->status ?? false;
        $tenant->save();

        return redirect()->route('tenant.index')->with('message', 'Atualizado com sucesso!');
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
            return redirect()->route('tenant.index')->with('warning', 'Tenant não encontrado!');
        }

        $tenant = Tenant::find($id);
        $tenant->delete();

        return redirect()->route('tenant.index')->with('message', 'Removido com sucesso!');
    }
}
