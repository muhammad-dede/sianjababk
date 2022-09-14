<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function tentang()
    {
        return view('website.tentang');
    }

    public function download()
    {
        return view('website.download');
    }

    public function kontak()
    {
        return view('website.kontak');
    }
}
