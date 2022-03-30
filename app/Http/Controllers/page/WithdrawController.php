<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class WithdrawController extends Controller
{

    public function withdraw(){

        $user = Auth::user();
        
        $profile = DB::table('profile')->where('id_user',$user->id)->get();
        return view('page.withdraw',['profile'=>$profile]);
    }
    // rút là 1 nạp là 0
    public function withdrawpost(Request $request){
        $this->validate(request(), [
            'phuong_thuc' => 'required',
            'name_bank' => 'required',              
        ]);
        if ($request->phuong_thuc == 'ngân hàng') {
            $this->validate(request(), [
                'number_money' => 'required',
                'number_bank' => 'required',
                'brank_bank' => 'required',             
            ]);
        }else{
            $this->validate(request(), [          
                'number_momo' => 'required',           
            ]);
        }
        $user = Auth::user();        
        $profile = DB::table('profile')
        ->where('money','>=',$request->number_money)
        ->where('id_user',$user->id)
        ->get(); 
        if(count($profile)>0){        
            $rut = DB::table('history_deposit_withdraw')->insert([
                'id_user' => $user->id,
                'number_momo' => $request->number_momo,
                'phuong_thuc' => $request->phuong_thuc,
                'number_money' => $request->number_money,
                'status' => 0,
                'active' => 0,
                'created_at' => new \DateTime(),
            ]);
            if($rut){
                foreach ($profile as $key => $value) {
                     DB::table('profile')->where('id_user',$user->id)
                    ->update([
                    'number_bank' => $request->number_bank,
                    'brank_bank' => $request->brank_bank,
                    'name_bank' => $request->name_bank,
                    'money' => $value->money - $request->number_money,
                    'updated_at' => new \DateTime()
                ]);
                }
               
            }         
        }else{          
            $alert='Bạn không đủ số dư !';
            return redirect()->back()->with('alert',$alert);
        }

        $alert='Bạn đã rút tiền thành công vui lòng chờ trong vòng 24h!';

        return redirect()->back()->with('alert',$alert);
        
    }
}
