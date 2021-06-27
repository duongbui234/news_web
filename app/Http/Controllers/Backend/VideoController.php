<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    //
    public function videoGallery()
    {
        $video = DB::table('videos')->orderBy('id', 'desc')->paginate(4);
        return view('admin.video.index', compact('video'));
    }
    public function addVideo()
    {
        return view('admin.video.create');
    }
    public function storeVideo(Request $req)
    {
        $data = [];
        $data['title'] = $req->title;
        $data['type'] = $req->type;
        $data['embed_code'] = $req->embed_code;

        DB::table('videos')->insert($data);

        $notification = array(
            'message' => 'Video insert successfully',
            'alertType' => 'success',
        );
        return Redirect()->route('video.all')->with($notification);
    }
}
