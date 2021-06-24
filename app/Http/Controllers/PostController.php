<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function createPost()
    {
        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();
        return view('admin.post.create', compact('categories', 'districts'));
    }
}
