<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use App\Supplier;
use App\Producer;

use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function getDS(){
        $sp = Product::paginate(10);
        $loai_sp = ProductType::all();


        return view('admin.sanpham.danhsach',compact('sp','loai_sp'));
    }
    public function getThem(){
        $loai_sp = ProductType::all();
        return view('admin.sanpham.them',compact('loai_sp'));
    }
    public function postThem( Request $req){
        $this->validate($req,
        [
            'name'=>'required|min:10|max:150',
            'unit_price'=>'required',
            'quantity'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên sản phẩm',
            'name.min'=>'Tên sản phẩm từ 10 đến 150 kí tự',
            'name.max'=>'Tên sản phẩm từ 10 đến 150 kí tự',
            'name.unit_price'=>'Bạn chưa nhập giá',
            'name.quantity'=>'Bạn chưa nhập số lượng',
        ]);
        $sp = new Product;
        $sp->name = $req->name;
        $sp->id_type =$req->id_type;
        $sp->description = $req->description;
        $sp->unit_price = $req->unit_price;
        $sp->promotion_price = $req->promotion_price;
        $sp->quantity = $req->quantity;
        $sp->unit =$req->unit;
        $sp->new = $req->new;
        $sp->image= $req->image;
        $sp->save();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $sp = Product::find($id);
        $loai_sp = ProductType::all();
        return view('admin.sanpham.sua',compact('sp','loai_sp'));
    }
    public function postSua(Request $req, $id){
        $sp = Product::find($id);
        $this->validate($req,
        [
            'name'=>'required|min:10|max:150',
            'unit_price'=>'required',
            'quantity'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên sản phẩm',
            'name.min'=>'Tên sản phẩm từ 10 đến 150 kí tự',
            'name.max'=>'Tên sản phẩm từ 10 đến 150 kí tự',
            'name.unit_price'=>'Bạn chưa nhập giá',
            'name.quantity'=>'Bạn chưa nhập số lượng',
        ]);
        $sp->name = $req->name;
        $sp->id_type =$req->id_type;
        $sp->description = $req->description;
        $sp->unit_price = $req->unit_price;
        $sp->promotion_price = $req->promotion_price;
        $sp->quantity = $req->quantity;
        $sp->unit =$req->unit;
        $sp->new = $req->new;
        $sp->image= $req->image;
        $sp->save();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
        $sp = Product::find($id);
        $sp->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }
    public function getAn($id){
    	$sp= Product::find($id);
    	$sp->status='0';
    	$sp->save();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Ẩn thành công!');
    }
    public function getHien($id){
    	$sp= Product::find($id);
    	$sp->status='1';
    	$sp->save();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Hiển thị thành công!');
    }

}