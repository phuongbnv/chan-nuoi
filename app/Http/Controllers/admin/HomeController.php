<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function users(){
        return view('admin.users');
    }
    public function deposit(){
        $deposit = DB::table('history_deposit_withdraw')
        ->select(DB::raw('*,history_deposit_withdraw.created_at,history_deposit_withdraw.id'))
        ->join('users','history_deposit_withdraw.id_user','users.id')
        ->join('profile','profile.id_user','users.id')
        ->where('status',1)
        ->orderBy('history_deposit_withdraw.id','desc')
        ->get(); 
        return view('admin.deposit',['deposit'=>$deposit]);
    }
    public function withdraw(){
        $withdraw = DB::table('history_deposit_withdraw')
        ->select(DB::raw('*,history_deposit_withdraw.created_at,history_deposit_withdraw.id'))
        ->join('users','history_deposit_withdraw.id_user','users.id')
        ->join('profile','profile.id_user','users.id')
        ->where('status',0)
        ->orderBy('history_deposit_withdraw.id','desc')
        ->get(); 
        return view('admin.withdraw',['withdraw'=>$withdraw]);
    }
    public function duyetrut(Request $request){
        $money = DB::table('history_deposit_withdraw')
        ->join('profile','profile.id_user','history_deposit_withdraw.id_user')
        ->where('history_deposit_withdraw.id',$request->id)
        ->where('status',0)
        ->first();
        DB::table('history_deposit_withdraw')->where('id',$request->id)
        ->update(['active'=>1]);
        return 'thành công';
    }
    public function duyet(Request $request){

        $money = DB::table('history_deposit_withdraw')
        ->join('profile','profile.id_user','history_deposit_withdraw.id_user')
        ->where('history_deposit_withdraw.id',$request->id)
        ->where('status',1)
        ->first();
        DB::table('profile')->where('id_user',$money->id_user)->update(['money'=>$money->money+$money->number_money,'level'=>$request->level]);
        DB::table('history_deposit_withdraw')->where('id',$request->id)
        ->update(['active'=>1]);

        $number = $money->number_money;
        for ($i=1; $i <= 10 ; $i++) { 

            if ($money->invite_code_father !== null) {
                $users = DB::table('profile')->where('invite_code',$money->invite_code_father)->first();
                switch ($i) {
                  case 1:
                    DB::table('profile')
                    ->where('id_user',$users->id_user)
                    ->update(['money'=>$users->money+($number/10),'money_gt'=>$users->money_gt+($number/10)]);
                    break;
                  case 2:
                    DB::table('profile')
                    ->where('id_user',$users->id_user)
                    ->update(['money'=>$users->money+($number/20),'money_gt'=>$users->money_gt+($number/20)]);
                    break;
                  case 3:
                    DB::table('profile')
                    ->where('id_user',$users->id_user)
                    ->update(['money'=>$users->money+($number * 3/100),'money_gt'=>$users->money_gt+($number*3/100)]);
                    break;
                  default:
                    DB::table('profile')
                    ->where('id_user',$users->id_user)
                    ->update(['money'=>$users->money+($number * 2/100),'money_gt'=>$users->money_gt+($number/2/100)]);
                }
                $money = DB::table('profile')->where('invite_code',$money->invite_code_father)->first();

            }
        }
        return 'thành công';
    }
    public function chitiettaikhoan($id){
        $deposit = DB::table('history_deposit_withdraw')
        ->select(DB::raw('*,history_deposit_withdraw.created_at,history_deposit_withdraw.id'))
        ->join('users','history_deposit_withdraw.id_user','users.id')
        ->where('history_deposit_withdraw.id_user',$id)
        ->get();
        return view('admin.chitiettaikhoan',['deposit'=>$deposit]);
    }
    
}
