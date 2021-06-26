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
    public function prayer()
    {
        $prayer = DB::table('prayers')->first();
        return view('admin.setting.prayer', compact('prayer'));
    }

    public function updatePrayer($id, Request $req)
    {
        $data = [];
        $data['hanoi'] = $req->hanoi;
        $data['saigon'] = $req->saigon;
        $data['danang'] = $req->danang;
        $data['sonla'] = $req->sonla;
        $data['haiduong'] = $req->haiduong;
        $data['thaibinh'] = $req->thaibinh;

        DB::table('prayers')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Update successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('prayer.all')->with($notification);
    }

    public function livetv()
    {
        $livetv = DB::table('livetv')->first();
        return view('admin.setting.livetv', compact('livetv'));
    }

    public function updateLivetv($id, Request $req)
    {
        DB::table('livetv')->where('id', $id)->update(['embed_code' => $req->embed_code]);
        $notification = [
            'message' => 'Update successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('livetv.all')->with($notification);
    }
    public function active($id)
    {
        DB::table('livetv')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'Active successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('livetv.all')->with($notification);
    }
    public function inactive($id)
    {
        DB::table('livetv')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'Inactive successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('livetv.all')->with($notification);
    }
    public function notice()
    {
        $notice = DB::table('notices')->first();
        return view('admin.setting.notice', compact('notice'));
    }

    public function updateNotice($id, Request $req)
    {
        DB::table('notices')->where('id', $id)->update(['notice' => $req->notice]);
        $notification = [
            'message' => 'Updated successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('notice.all')->with($notification);
    }
    public function activeNotice($id)
    {
        DB::table('notices')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'Active successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('notice.all')->with($notification);
    }
    public function inactiveNotice($id)
    {
        DB::table('notices')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'Inactive successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('notice.all')->with($notification);
    }
}
