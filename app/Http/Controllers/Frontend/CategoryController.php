<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    public function index($id, $category_en)
    {
        $posts = DB::table('posts')->where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
        $categoryName = DB::table('categories')->where('id', $id)->first();

        return view('main.category-page', compact('posts', 'categoryName'));
    }
}
