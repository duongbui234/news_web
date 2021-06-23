<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDistrictController extends Controller
{
    //
    public function index()
    {
        $subDistricts = DB::table('subdistricts')->join('districts', 'districts.id', 'subdistricts.district_id')->select('subdistricts.*', 'districts.district_en')->orderBy('id', 'desc')->paginate(3);
        return view('admin.subdistrict.index', compact('subDistricts'));
    }

    public function addSubDis()
    {
        $districts = DB::table('districts')->get();
        return view('admin.subdistrict.create', compact('districts'));
    }
    public function storeSubDis(Request $req)
    {
        $req->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_vn' => 'required|unique:subdistricts|max:255',
        ]);
        DB::table('subdistricts')->insert([
            'subdistrict_en' => $req->subdistrict_en,
            'subdistrict_vn' => $req->subdistrict_vn,
            'district_id' => $req->district_id
        ]);
        $notification = [
            'message' => 'Inserted success',
            'alertType' => 'success'
        ];
        return Redirect()->route('subdistrict')->with($notification);
    }
    public function editSubDis($id)
    {
        $subdistrict = DB::table('subdistricts')->where('id', $id)->first();
        $districts = DB::table('districts')->get();

        return view('admin.subdistrict.edit', compact('subdistrict', 'districts'));
    }
    public function updateSubDis($id, Request $req)
    {
        DB::table('subdistricts')->where('id', $id)->update([
            'subdistrict_en' => !$req->subdistrict_en ? $req->subdistrict_en_old : $req->subdistrict_en,
            'subdistrict_vn' => !$req->subdistrict_vn ? $req->subdistrict_vn_old : $req->subdistrict_vn,
            'district_id' => !$req->district_id ? $req->district_id_old : $req->district_id,
        ]);
        $notification = [
            'message' => 'Updated success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('subdistrict')->with($notification);
    }
    public function deleteSubDis($id)
    {
        DB::table('subdistricts')->where('id', $id)->delete();
        $notification = [
            'message' => 'Delete success 👌👌👌',
            'alertType' => 'success'
        ];
        return Redirect()->route('subdistrict')->with($notification);
    }
}
