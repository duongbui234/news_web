<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    //
    public function photoGallery()
    {
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate(4);
        return view('admin.photo.index', compact('photo'));
    }
    public function addPhoto()
    {
        return view('admin.photo.create');
    }
    public function storePhoto(Request $req)
    {
        $data = [];
        $data['title'] = $req->title;
        $data['type'] = $req->type;

        $image = $req->photo;
        if ($image) {
            $imgName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $upLocation = 'image/photo_gallery/';

            Image::make($image)->resize(500, 500)->save($upLocation . $imgName);
            $data['photo'] = $upLocation . $imgName;

            DB::table('photos')->insert($data);

            $notification = array(
                'message' => 'Photo insert successfully',
                'alertType' => 'success',
            );
            return Redirect()->route('photo.all')->with($notification);
        } else {
            return Redirect()->back();
        }
    }
}
