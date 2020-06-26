<?php

namespace App\Http\Controllers;

use App\BillDetail;
use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use PDF;

class BillDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chitietdonhang($id){
    	$db=Bill::find($id);

    	$kq="<div style='font-family:DejaVu Sans' style='width:600px;margin-left:50px;margin-top:50px;margin-bottom:200px'><table width='100%' >";
    	$kq.="<tr>";
    	$kq.="<td width='400px'align='center'colspan='2'style='font-weight:bold,'>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> <u style='font-weight:bold'>Độc lập - Tự do - Hạnh phúc</u></td>";
    	$kq.="</tr>";
    	$kq.="<tr>";
    	$kq.="<td width='250px' style='padding-top:20px;font-weight:bold'> CỬA HÀNG BÁNH NGỌT BAKKERS ALLEY</td>";
    	$kq.="<td width='400px' align='right' style='padding-top:20px'>Số hóa đơn: <span style='font-weight:bold'>$id</span></td>";
    	$kq.="</tr>";
    	$kq.="</table>";
    	$kq.="<h1 style='text-align:center'> ĐƠN HÀNG THANH TOÁN</h1>";
    	$kq.="<table width='700px'>";
    	$kq.="<tr>";
    	$kq.="<td>Tên khách hàng: </td>";
    	$kq.="<td>".$db->Customer->name."</td>";
    	$kq.="</tr>";
    	$kq.="<tr>";
    	$kq.="<td>Địa chỉ:</td>";
    	$kq.="<td>".$db->Customer->address."</td>";
    	$kq.="</tr>";
    	$kq.="<tr>";
    	$kq.="<td>Số điện thoại:</td>";
    	$kq.="<td>".$db->Customer->phone_number."</td>";
        $kq.="</tr>";
        $kq.="<tr>";
    	$kq.="<td>Phương thức thanh toán:</td>";
    	$kq.="<td>".$db->payment->name."</td>";
    	$kq.="</tr>";
    	$kq.="</table>";
    	$chitiet=BillDetail::where('id_bill',$id)->get();
    	$kq.="<table  width='100%' style='border:1px solid #291c1ce8;margin-top: 20px;text-align:center;border-collapse: collapse'>";
    	$kq.="<tr style='border: 1px solid black;text-align:center;height:50px'>";
    	$kq.="<th style='border: 1px solid #291c1ce8;'>STT</th>";
    	$kq.="<th style='border: 1px solid #291c1ce8;'>Tên sản phẩm</th>";
    	$kq.="<th style='border: 1px solid #291c1ce8;'>Đơn giá</th>";
    	$kq.="<th style='border: 1px solid #291c1ce8;'>Số lượng</th>";
    	$kq.="<th style='border: 1px solid #291c1ce8;'>Thành tiền</th>";
    	$kq.="</tr>";
    	$dem=1;
    	$tongtien=0;
    	foreach($chitiet as $sp)
    	{
    	$kq.="<tr style='border: 1px solid #291c1ce8;text-align:center;'>";
    	$kq.="<td style='border: 1px solid #291c1ce8;'>".$dem++."</td>";
    	$kq.="<td style='width:200px;height:100px;border: 1px solid #291c1ce8;'>".$sp->Product->name."</td>";
    	$kq.="<td style='border: 1px solid #291c1ce8;'>".number_format($sp->product->unit_price)."</td>";
    	$kq.="<td style='border: 1px solid #291c1ce8;'>".$sp->quantity."</td>";
    	$tongtien+=$sp->quantity*$sp->product->unit_price;
    	$kq.="<td style='border: 1px solid #291c1ce8;'>".number_format($sp->quantity*$sp->product->unit_price)."</td>";
    	$kq.="</tr>";
    	}
        $kq.="</table>";
        $kq.="<table style='width: 600px;margin-top: 20px;font-weight: bold;'>";
    	$kq.="<tr style='text-align:left;'>";
    	$kq.="<td colspan=4 >Tổng tiền :</td>";
    	$kq.="<td style='float:right'>".number_format($tongtien)." đ</td>";
    	$kq.="</tr>";
        $kq.="</table>";
    	$kq.="</div>";
    	return $kq;
    }
    function pdf($id)
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->chitietdonhang($id));
     return $pdf->stream();
    }
}
