<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DepositController extends Controller
{
    public function deposit(){
        return view('page.deposit');
    }

    public function depositpost(Request $request){
        $this->validate(request(), [
            'phuong_thuc' => 'required',
            'number_money' => 'required',
        ]);
        $user = Auth::user(); 
        $rut = DB::table('history_deposit_withdraw')->insert([
                'id_user' => $user->id,
                'phuong_thuc' => $request->phuong_thuc,
                'number_money' => $request->number_money,
                'status' => 1,
                'active' => 0,
                'created_at' => new \DateTime(),
            ]);
        
        $alert='Bạn đã nạp tiền thành công vui lòng chuyển khoản cho chúng tôi với mã QR phía dưới hoặc thông tin toài khoản phía dưới để chúng tôi kiễm tra trong vòng 30 phút!';
        if ($request->phuong_thuc == 'ngân hàng') {
            $img = 'nganhang.jpg';
        }else{
            $img = 'momo.jpg';
        }
        return redirect()->back()->with(['alert'=>$alert,'img'=>$img]);     
    }

}
