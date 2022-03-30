<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{    
    public function index(){
        $user = Auth::user();
        $users = DB::table('users')
        ->leftjoin('profile','users.id','profile.id_user')
        ->where('users.id',$user->id)
        ->get(); 
         
        $products = DB::table('product')->get();
        return view('page.home',['products'=>$products, 'users'=>$users]);
    }
    
    
    
    public function pagelink(){
        $user = Auth::user();
        $users = DB::table('users')
        ->leftjoin('profile','users.id','profile.id_user')
        ->where('users.id',$user->id)
        ->first(); 
        return view('page.link',['users'=>$users]);
    }
    
    public function tiet_kiem(Request $request){
        if ($request->getMethod() == 'GET') {
            return view('page.tietkiem');
        }
        $this->validate(request(), [
            'tools' => 'required',
            'money' => 'required',
        ]);
        $user = Auth::user();
        $profile = DB::table('profile')->where('id_user',$user->id)->first();
        if($profile->money >= $request->number_money){
            DB::table('table_tiet_kiem')->insert([
                'id_user' => $user->id,
                'thoi_han' => $request->tools,
                'money_tien_gui' => $request->money,
                'created_at' => new \DateTime()
            ]);
            DB::table('profile')->where('id_user',$user->id)->update([
                'money' => $profile->money - $request->money
            ]);
            return redirect()->back()->with('alert','Gửi thành công');
        }
        return redirect()->back()->with('alert','Số tiền không đủ để gửi');
    }
    
    
    public function addChanNuoi(Request $request){
        $user = Auth::user();
        $profiles = DB::table('profile')->where('id_user',$user->id)->get();
        $products = DB::table('product')->where('id',$request->id_product)->get();
        foreach ($profiles as $key => $profile) {
            $money_profile = $profile->money;
        }
        foreach ($products as $key => $product) {
            $money_product = $product->phi_giam_gia;
        }
        if ($money_profile >= $money_product) {
            $chan_nuoi =DB::table('history_chan_nuoi')
            ->where('id_product',$request->id_product)
            ->where('id_user',$user->id)
            ->where('status',0)
            ->get();
            if (count($chan_nuoi) > 0 ) {
                return 'Bạn đang nuôi con vật này';
            }
                DB::table('history_chan_nuoi')
                ->insert([
                    'id_product'=>$request->id_product,
                    'id_user'=>$user->id,
                    'status'=> 0,
                    'created_at' => new \DateTime()
                ]);
                DB::table('profile')->where('id_user',$user->id)
                ->update(['money'=>$money_profile-$money_product,'updated_at'=>new \DateTime()]);
                
                return 1;            
        }        
        return 'không đủ tiền';  
    }
}
