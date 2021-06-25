<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function index()
    {
        $posts = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')
            ->join('districts', 'posts.district_id', 'districts.id')->join('subcategories', 'posts.subcategory_id', 'subcategories.id')->join('subdistricts', 'posts.district_id', 'subdistricts.id')->select('posts.*', 'categories.category_en', 'districts.district_en', 'subcategories.subcategory_en', 'subdistricts.subdistrict_en')->orderBy('id', 'desc')->paginate(5);

        return view('admin.post.index', compact('posts'));
    }

    public function createPost()
    {
        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();
        return view('admin.post.create', compact('categories', 'districts'));
    }

    public function getSubCategory($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }

    public function getSubDistrict($district_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    public function storePost(Request $req)
    {
        $req->validate([
            'district_id' => 'required',
            'category_id' => 'required',
        ]);

        $data = [];
        $data['title_en'] = $req->title_en;
        $data['title_vn'] = $req->title_vn;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $req->category_id;
        $data['subcategory_id'] = $req->subcategory_id;
        $data['district_id'] = $req->district_id;
        $data['subdistrict_id'] = $req->subdistrict_id;
        $data['tags_en'] = $req->tags_en;
        $data['tags_vn'] = $req->tags_vn;
        $data['details_en'] = $req->details_en;
        $data['details_vn'] = $req->details_vn;
        $data['headline'] = $req->headline;
        $data['first_section'] = $req->first_section;
        $data['big_thumbnail'] = $req->big_thumbnail;
        $data['first_section_thumbnail'] = $req->first_section_thumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('m');

        $image = $req->image;

        if ($image) {
            $upLocation = 'image/post/';
            $imgName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(500, 300)->save($upLocation . $imgName);

            $data['image'] = $upLocation . $imgName;

            DB::table('posts')->insert($data);
            $notification = [
                'message' => 'Inserted successfully 🚀🚀🚀',
                'alertType' => 'success'
            ];
            return Redirect()->route('post.all')->with($notification);
        } else {
            return Redirect()->back();
        }
    }
}
