<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function getDanhSach()
    { $slide = Slide::all();
        return view('admin.slide.danhsach',['slide' => $slide]);
    }
    public function getThem()
    {
    	return view('admin.slide.them');
    }
    public function getSua()
    {
    	return view('admin.slide.sua');
}
}
