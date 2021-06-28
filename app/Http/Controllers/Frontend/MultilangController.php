<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MultilangController extends Controller
{
    public function toEng(Request $req)
    {
        $req->session()->get('lang');
        $req->session()->forget('lang');
        $req->session()->put('lang', 'english');
        return Redirect()->back();
    }
    public function toVn(Request $req)
    {
        $req->session()->get('lang');
        $req->session()->forget('lang');
        $req->session()->put('lang', 'vietnamese');
        return Redirect()->back();
    }
}
