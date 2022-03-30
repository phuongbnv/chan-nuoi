<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserPageController extends Controller
{
    public function addBank(Request $request){
        $this->validate(request(), [
            'stk' => 'required|min:7',
            'nametk' => 'required' 
        ]);
        $user = Auth::user();
        DB::table('profile')
            ->where('id_user',$user->id)
            ->update(['brank_bank' =>$request->nganhang, 
                    'number_bank' =>$request->stk, 
                    'name_bank' =>$request->nametk,])
                    ;
        return redirect()->back()->with('alert','Thêm tài khoản thành công');
    }
    public function income(){
        $user = Auth::user();
        $users = DB::table('users')
        ->leftjoin('profile','users.id','profile.id_user')
        ->where('users.id',$user->id)
        ->first(); 
        $gioithieu = DB::table('profile')
        ->leftjoin('users','users.id','profile.id_user')
        ->where('invite_code_father',$users->invite_code)
        ->select('users.phone','profile.created_at')
        ->get();
        $hoan_thanh = DB::table('history_chan_nuoi')
        ->join('product','product.id','history_chan_nuoi.id_product')
        ->where('history_chan_nuoi.id_user',$user->id)
        ->where('history_chan_nuoi.status',1)
        ->get();
        return view('page.income',['hoan_thanh'=>$hoan_thanh, 'users'=>$users,'gioithieu' => $gioithieu]);
    }
    public function transaction_history(){
        $user = Auth::user();
        $users = DB::table('users')
        ->leftjoin('profile','users.id','profile.id_user')
        ->where('users.id',$user->id)
        ->first(); 
        $gioithieu = DB::table('profile')
        ->leftjoin('users','users.id','profile.id_user')
        ->where('invite_code_father',$users->invite_code)
        ->select('users.phone','profile.created_at')
        ->get();
        // $products = DB::table('product')->get();
        // 1 là nạp, 0 là rút
        $deposit = DB::table('history_deposit_withdraw')
        ->where('id_user',$user->id)
        ->where('status',1)
        ->get();
        $withdraw = DB::table('history_deposit_withdraw')
        ->where('status',0)
        ->where('id_user',$user->id)
        ->get();
        return view('page.transaction-history',['withdraw'=>$withdraw,'deposit'=>$deposit, 'users'=>$users,'gioithieu' => $gioithieu]);
    }
    public function upgrade_account(){
        return view('page.upgrade-account');
    }
    public function setting_account(){
        $user = Auth::user();
        $profile = DB::table('users')
        ->leftjoin('profile','users.id','profile.id_user')
        ->where('users.id',$user->id)
        ->get(); 
        return view('page.setting-account',['profile'=>$profile]);
    }
    public function profie(){
        $user = Auth::user();
        $users = DB::table('users')
        ->leftjoin('profile','users.id','profile.id_user')
        ->where('users.id',$user->id)
        ->first(); 
        $gioithieu = DB::table('profile')->where('invite_code_father',$users->invite_code)->get();
        $hoan_thanh = DB::table('history_chan_nuoi')
        ->where('status',1)
        ->where('id_user',$user->id)
        ->get();
        return view('page.profie',['hoan_thanh'=>$hoan_thanh, 'users'=>$users, 'count'=> count($gioithieu)]);
    }
}
