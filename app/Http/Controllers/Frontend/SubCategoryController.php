<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index($id, $subcategory_en)
    {
        $posts = DB::table('posts')->where('subcategory_id', $id)->orderBy('id', 'desc')->paginate(5);
        $subcategoryName = DB::table('subcategories')->where('id', $id)->first();

        return view('main.subcategory-page', compact('posts', 'subcategoryName'));
    }
}
