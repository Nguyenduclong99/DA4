<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\Customer;
use App\BillDetail;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDanhSach(){
		$donhang= Bill::all();
		$khachhang=Customer::all();
    	return view('admin.donhang.danhsach',compact('donhang','khachhang'));
    }
    public function getSua($id){
        $donhang=Bill::find($id);
        $khachhang=Customer::where('id',$donhang->id_customer)->first();
        return view('admin.donhang.sua',['donhang'=>$donhang,'khachhang'=>$khachhang]);
    }
    public function postSua(Request $request,$id){
        $donhang=Bill::find($id);
         $this->validate($request,[
            'tongtien'=>'required',
            'payment'=>'required'
         ],[
            'tongtien.required'=>'Bạn chưa nhập tổng tiền',
            'payment.required'=>'Bạn chưa nhập hình thức thanh toán'
         ]);
         $donhang->total=$request->tongtien;
         $donhang->payment=$request->payment;
         $donhang->save();
         return redirect('admin/donhang/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    public function getXoa($id){
    	$donhang=Bill::find($id);
        $ctdonhang= BillDetail::where('id_bill',$id)->get();
        foreach ($ctdonhang as $ct) {
            $ct->delete();
        }
        $donhang->delete();
        return redirect('admin/donhang/danhsach')->with('thongbao','Xóa thành công');
    }
}
