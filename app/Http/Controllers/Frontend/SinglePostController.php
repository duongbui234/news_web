<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SinglePostController extends Controller
{
    //
    public function index($id)
    {
        $post = DB::table('posts')->join('categories', 'categories.id', 'posts.category_id')->join('subcategories', 'subcategories.id', 'posts.subcategory_id')->join('users', 'users.id', 'posts.user_id')->select('posts.*', 'categories.category_en', 'categories.category_vn', 'subcategories.subcategory_en', 'subcategories.subcategory_vn', 'users.name')->where('posts.id', $id)->first();

        return view('main.single-post', compact('post'));
    }
}
