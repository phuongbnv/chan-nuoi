<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')
        ->join('profile','profile.id_user','users.id')
        ->get();
        return view('admin.users',['users'=>$users]);
    }
    public function register(Request $request){
        
        
        if ($request->getMethod() == 'GET') {
            return view('register',['gioithieu'=> $request->gioithieu]);
        }
        if (is_null($request->code)){
            $invate = null;
        }else{
            $invate = $request->code;
        }
        $this->validate(request(), [
            'phone' => 'required|unique:users|min:9|max:10',
            'password' => 'required',
            'password_confirm' => 'required|same:password' 
        ]);
        $user = DB::table('users')->insert([
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        
        if($user){            
            $users = DB::table('users')->max('id');
            $profile = DB::table('profile')->insert([
                'id_user' => $users,
                'level' => 0,
                'money' => 50000,
                'invite_code_father' => $invate,
                'invite_code' => rand(10000,99999).''.$users,     
                'created_at'=>new \DateTime()       
            ]);
            $alert='Đăng ký thành công';
            return redirect()->route('login')->with('alert',$alert);
        }else{
            $alert='Đăng ký không thành công';

            return redirect()->back()->with('error',$alert);
        }
    }
    
    public static function login(Request $request){
        if ($request->getMethod() == 'GET') {
            if (Auth::check()) {
                if (Auth::user()->role=='admin') {
                    return redirect()->route('admin.home');
                }
                return redirect()->route('page.home');
            }
            return view('login');
        }
        $credentials = $request->only(['phone', 'password']);
        if (Auth::attempt($credentials)) {
                if (Auth::user()->role=='admin') {
                    return redirect()->route('admin.home');
                }           
            $alert='Login thành công';
            return redirect()->route('page.home')->with('alert',$alert);
        } else {
            $alert='Login không thành công';

            return redirect()->back()->with('error',$alert);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function changePassword(Request $request)
    {
        $this->validate(request(), [
            'curPassword' => 'required',            
            'newPassword' => 'required',
            'password_confirm' => 'required|same:newPassword' 
        ]);
        $user = Auth::user();

        $curPassword = $request->curPassword;
        $newPassword = $request->newPassword;
        if (Hash::check($curPassword, $user->password)) {
            $user_id = $user->id;
            DB::table('users')->where('id',$user_id)->update(['password'=>Hash::make($newPassword)]);

            $alert='Thay đổi mật khẩu thành công';
            return redirect()->route('logout')->with('alert',$alert);
        }
        else
        {
            $alert='Thay đổi mật khẩu không thành công';
            return redirect()->back()->with('alert',$alert);
        }
    }
}
