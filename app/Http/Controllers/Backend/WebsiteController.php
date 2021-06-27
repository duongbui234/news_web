<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    //
    public function index()
    {
        $websites = DB::table('websites')->paginate(3);
        return view('admin.website.index', compact('websites'));
    }
    public function addWebsite()
    {
        return view('admin.website.create');
    }
    public function storeWebsite(Request $req)
    {
        DB::table('websites')->insert([
            'name' => $req->website_name,
            'link' => $req->website_link,
        ]);
        $notification = [
            'message' => 'Insert successfully',
            'alertType' => 'success'
        ];
        return Redirect()->route('website.all')->with($notification);
    }
    public function editWebsite($id)
    {
        $website = DB::table('websites')->where('id', $id)->first();
        return view('admin.website.edit', compact('website'));
    }
    public function updateWebsite(Request $req, $id)
    {
        DB::table('websites')->where('id', $id)->update([
            'name' => $req->website_name,
            'link' => $req->website_link,
        ]);
        $notification = [
            'message' => 'Updated successfully',
            'alertType' => 'success'
        ];
        return Redirect()->route('website.all')->with($notification);
    }
    public function deleteWebsite($id)
    {
        DB::table('websites')->where('id', $id)->delete();
        $notification = [
            'message' => 'Deleted successfully',
            'alertType' => 'success'
        ];
        return Redirect()->route('website.all')->with($notification);
    }
}
