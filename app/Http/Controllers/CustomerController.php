<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDanhSach(){
    	$khachhang= Customer::orderBy('id','asc')->paginate(10);
    	return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);
    }
    public function getSua($id){
        $khachhang=Customer::find($id);
    	return view('admin.khachhang.sua',['khachhang'=>$khachhang]);
    }
    public function postSua(Request $request,$id){
        $khachhang=Customer::find($id);
         $this->validate($request,[
            'Ten'=>'required|min:3|max:100|unique:type_products,name'
         ],[
            'Ten.required'=>'Bạn chưa nhập tên khách hàng',
            'Ten.unique'=>'Tên khách hàng đã tồn tại',
            'Ten.min'=>'Tên khách hàng phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên khách hàng phải có độ dài từ 3 đến 100 kí tự',
         ]);
         $khachhang->name=$request->Ten;
         $khachhang->gender=$request->Gioitinh;
         $khachhang->email=$request->Email;
         $khachhang->address=$request->Address;
         $khachhang->phone_number=$request->Phone;
         $khachhang->save();
         return redirect('admin/khachhang/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    public function getThem(){
    	return view('admin.khachhang.them');
    }
    public function postThem(Request $request){
    	 $this->validate($request,[
            'Ten'=>'required|min:3|max:100'
         ],[
            'Ten.required'=>'Bạn chưa nhập tên khách hàng',
            'Ten.min'=>'Tên khách hàng phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên khách hàng phải có độ dài từ 3 đến 100 kí tự',
         ]);
         $khachhang=new Customer;
         $khachhang->name=$request->Ten;
         $khachhang->gender=$request->Gioitinh;
         $khachhang->email=$request->Email;
         $khachhang->address=$request->Address;
         $khachhang->phone_number=$request->Phone;
         $khachhang->save();
         return redirect('admin/khachhang/them')->with('thongbao','Thêm thành công');

    }
}
