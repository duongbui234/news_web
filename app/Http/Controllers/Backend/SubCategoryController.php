<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = DB::table('subcategories')->join('categories', 'categories.id', 'subcategories.category_id')->select('subcategories.*', 'categories.category_en')->orderBy('id', 'desc')->paginate(3);
        return view('admin.subcategory.index', compact('subCategories'));
    }

    public function addSubCate()
    {
        $categories = DB::table('categories')->get();
        return view('admin.subcategory.create', compact('categories'));
    }
    public function storeSubCategory(Request $req)
    {
        $req->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_vn' => 'required|unique:subcategories|max:255',
        ]);
        DB::table('subcategories')->insert([
            'subcategory_en' => $req->subcategory_en,
            'subcategory_vn' => $req->subcategory_vn,
            'category_id' => $req->category_id
        ]);
        $notification = [
            'message' => 'Inserted success',
            'alertType' => 'success'
        ];
        return Redirect()->route('subcategories')->with($notification);
    }

    public function editSubCategory($id)
    {
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $categories = DB::table('categories')->get();

        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function updateSubCategory($id, Request $req)
    {
        DB::table('subcategories')->where('id', $id)->update([
            'subcategory_en' => !$req->subcategory_en ? $req->subcategory_en_old : $req->subcategory_en,
            'subcategory_vn' => !$req->subcategory_vn ? $req->subcategory_vn_old : $req->subcategory_vn,
            'category_id' => !$req->category_id ? $req->category_id_old : $req->category_id,
        ]);
        $notification = [
            'message' => 'Updated success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('subcategories')->with($notification);
    }
    public function deleteSubCategory($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = [
            'message' => 'Delete success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('subcategories')->with($notification);
    }
}
