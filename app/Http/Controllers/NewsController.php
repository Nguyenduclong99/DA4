<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function getDanhSach()
    { $news = News::all();
        return view('admin.news.danhsach',['news' => $news]);
    }
    public function getThem()
    {
    	return view('admin.news.them');
    }
    public function getSua()
    {
    	return view('admin.news.sua');
}
}