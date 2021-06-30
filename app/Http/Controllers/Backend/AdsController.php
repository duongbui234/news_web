<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    //
    public function index()
    {
        $ads = DB::table('ads')->orderBy('id', 'desc')->get();
        return view('admin.ads.index', compact('ads'));
    }
    public function addAds()
    {
        return view('admin.ads.create');
    }
    public function storeAds(Request $req)
    {
        $data = array();
        $data['link'] = $req->link;
        $ads = $req->ads;
        $imgName = hexdec(uniqid()) . '.' . $ads->getClientOriginalExtension();
        $upLocation = 'image/ads/';
        if ($req->type == 1) {
            Image::make($ads)->resize(970, 90)->save($upLocation . $imgName);
            $data['ads'] = $upLocation . $imgName;

            $data['type'] = $req->type;

            DB::table('ads')->insert($data);

            $notification = array(
                'message' => 'Insert horizontal ads successfully',
                'alertType' => 'success',
            );
            return Redirect()->route('ads.all')->with($notification);
        }
        Image::make($ads)->resize(500, 500)->save($upLocation . $imgName);
        $data['ads'] = $upLocation . $imgName;

        $data['type'] = $req->type;

        DB::table('ads')->insert($data);

        $notification = array(
            'message' => 'Insert vertical ads successfully',
            'alertType' => 'success',
        );
        return Redirect()->route('ads.all')->with($notification);
    }
}
