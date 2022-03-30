<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TrangtraiController extends Controller
{
    public function trang_trai(){
        $user = Auth::user();
        $hoan_thanh = DB::table('history_chan_nuoi')
        ->join('product','product.id','history_chan_nuoi.id_product')
        ->where('history_chan_nuoi.id_user',$user->id)
        ->where('history_chan_nuoi.status',1)
        ->get();
        $thu_nhap = DB::table('history_chan_nuoi')
        ->join('product','product.id','history_chan_nuoi.id_product')
        ->where('history_chan_nuoi.id_user',$user->id)
        ->where('history_chan_nuoi.status',0)
        ->select(
            'history_chan_nuoi.id as id_history',
            'time',
            'loi_nhan',
            'phi_nhan_nuoi',
            'history_chan_nuoi.created_at',
            'name',
            'image'
        )
        ->get();
        return view('page.trang-trai',['hoan_thanh'=>$hoan_thanh, 'thu_nhap'=>$thu_nhap]);
    }
    public function ajax_history(Request $request){
        
        DB::table('history_chan_nuoi')->where('id',$request->id_history)
        ->update(['status'=>1,'updated_at'=>new \DateTime()]);
        $products = DB::table('history_chan_nuoi')
            ->join('product','history_chan_nuoi.id_product','product.id')
            ->join('profile','history_chan_nuoi.id_user','profile.id')            
            ->where('history_chan_nuoi.id',$request->id_history)
            ->first();
        DB::table('profile')
        ->update(['money'=> $products->phi_giam_gia + $products->money + ($products->loi_nhan*$products->time)]);
        return 'chúc mừng bạn đã hoàn thành nuôi '.$products->name;
    }
}
