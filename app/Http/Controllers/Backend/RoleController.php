<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    //

    public function index()
    {
        $writer = DB::table('users')->where('type', 0)->get();
        return view('admin.writer.index', compact('writer'));
    }

    public function addWriter()
    {
        return view('admin.writer.create');
    }
    public function storeWriter(Request $req)
    {
        $data = array();
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['password'] = Hash::make($req->password);
        $data['category'] = $req->category;
        $data['district'] = $req->district;
        $data['setting'] = $req->setting;
        $data['website'] = $req->website;
        $data['gallery'] = $req->gallery;
        $data['ads'] = $req->ads;
        $data['role'] = $req->role;
        $data['post'] = $req->post;
        $data['type'] = 0;

        DB::table('users')->insert($data);
        $notification = [
            'message' => 'insert user success',
            'alertType' => 'success'
        ];
        return Redirect()->back()->with($notification);
    }
}
