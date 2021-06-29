<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchByDistrictController extends Controller
{
    public function searchBy(Request $req)
    {
        $districtID = $req->district_id;
        $subdistrictID = $req->subdistrict_id;
        $posts = DB::table('posts')->where('district_id', $districtID)->where('subdistrict_id', $subdistrictID)->orderBy('id', 'desc')->paginate(5);
        $post = DB::table('posts')->where('district_id', $districtID)->where('subdistrict_id', $subdistrictID)->orderBy('id', 'desc')->first();
        $categoryName = DB::table('categories')->where('id', $post->category_id)->first();

        return view('main.category-page', compact('posts', 'categoryName'));
    }
}
