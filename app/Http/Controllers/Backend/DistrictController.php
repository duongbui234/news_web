<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    //
    public function index()
    {
        $district  = DB::table('districts')->orderBy('id', 'desc')->paginate(3);
        return view('admin.district.index', compact('district'));
    }
    public function addDistrict()
    {
        return view('admin.district.create');
    }
    public function storeDistrict(Request $req)
    {
        $req->validate([
            'district_en' => 'required|unique:districts',
            'district_vn' => 'required|unique:districts',
        ]);
        DB::table('districts')->insert([
            'district_en' => $req->district_en,
            'district_vn' => $req->district_vn,
        ]);
        $notification = [
            'message' => 'Create successfully 🚀🚀🚀',
            'alertType' => 'success',
        ];
        return Redirect()->route('district')->with($notification);
    }

    public function editDistrict($id)
    {
        $district = DB::table('districts')->where('id', $id)->first();
        return view('admin.district.edit', compact('district'));
    }
    public function updateDistrict($id, Request $req)
    {
        DB::table('districts')->where('id', $id)->update([
            'district_en' => !$req->district_en ? $req->district_en_old : $req->district_en,
            'district_vn' => !$req->district_vn ? $req->district_vn_old : $req->district_vn,
        ]);
        $notification = [
            'message' => 'Updated success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('district')->with($notification);
    }
    public function deleteDistrict($id)
    {
        DB::table('districts')->where('id', $id)->delete();
        $notification = [
            'message' => 'Delete success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('district')->with($notification);
    }
}
