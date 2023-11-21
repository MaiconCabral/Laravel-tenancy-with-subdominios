<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Tenant\ManagerTenant;

class HomeController extends Controller
{
    
    public function home(){
        $manager = new ManagerTenant();
        $tenant = $manager->tenant();

        $posts = Post::get();

        return view('site.home', compact(['tenant', 'posts']));
    }

    public function post($id){
        $manager = new ManagerTenant();
        $tenant = $manager->tenant();

        $posts = Post::find($id);

        return view('site.post', compact(['tenant', 'posts']));
    }
}
