<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(3);
        return view('admin.category.index', compact('categories'));
    }

    public function addCategory()
    {
        return view('admin.category.create');
    }

    public function storeCategory(Request $req)
    {
        $req->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_vn' => 'required|unique:categories|max:255',
        ]);
        DB::table('categories')->insert([
            'category_en' => $req->category_en,
            'category_vn' => $req->category_vn,
        ]);
        $notification = [
            'message' => 'Created success',
            'alertType' => 'success'
        ];
        return Redirect()->route('categories')->with($notification);
    }

    public function editCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $req, $id)
    {
        DB::table('categories')->where('id', $id)->update([
            'category_en' => !$req->category_en ? $req->category_en_old : $req->category_en,
            'category_vn' => !$req->category_vn ? $req->category_vn_old : $req->category_vn,
        ]);
        $notification = [
            'message' => 'Updated success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('categories')->with($notification);
    }

    public function deleteCategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        $notification = [
            'message' => 'Delete success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('categories')->with($notification);
    }
}
