<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $social = DB::table('socials')->first();
        return view('admin.social.index', compact('social'));
    }

    public function updateSocial($id, Request $req)
    {
        $data = [];
        $data['facebook'] = $req->facebook;
        $data['twitter'] = $req->twitter;
        $data['youtube'] = $req->youtube;
        $data['linkedin'] = $req->linkedin;
        $data['instagram'] = $req->instagram;

        DB::table('socials')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Update successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('social.all')->with($notification);
    }
}
