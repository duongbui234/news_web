<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function social()
    {
        $social = DB::table('socials')->first();
        return view('admin.setting.social', compact('social'));
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
    public function seo()
    {
        $seo = DB::table('seos')->first();
        return view('admin.setting.seo', compact('seo'));
    }

    public function updateSeo($id, Request $req)
    {
        $data = [];
        $data['meta_author'] = $req->meta_author;
        $data['meta_title'] = $req->meta_title;
        $data['meta_keyword'] = $req->meta_keyword;
        $data['meta_description'] = $req->meta_description;
        $data['google_analytics'] = $req->google_analytics;
        $data['google_verification'] = $req->google_verification;
        $data['alexa_analytics'] = $req->alexa_analytics;

        DB::table('seos')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Update successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('seo.all')->with($notification);
    }
}
