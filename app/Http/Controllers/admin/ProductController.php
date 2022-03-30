<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('product')->get();
        return view('admin.product.home',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phi_nhan_nuoi' => 'required',
            'loi_nhuan' => 'required',
            'phi_giam_gia' => 'required',
            'time' => 'required',
        ]);
          
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/product'), $imageName);

        $product = DB::table('product')->insert([
            'name' => $request->name,
            'phi_nhan_nuoi' => $request->phi_nhan_nuoi,
            'loi_nhan' => $request->loi_nhuan,
            'phi_giam_gia' => $request->phi_giam_gia,
            'time' => $request->time,
            'image' => $imageName,
        ]);
        $alert='Thêm thành công';

        return redirect()->back()->with('alert',$alert); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('product')->where('id',$id)->get();
        return view('admin.product.edit',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_image = DB::table('product')->where('id',$id)->get();
        if (!$request->image) {
            foreach($product_image as $product_image){
                $imageName = $product_image->image;
            }
        }else{
            foreach($product_image as $product_image){
                $file =public_path('img/product/'.$product_image->image);
                File::delete($file);
            }
            
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/product'), $imageName);
        }
        

        DB::table('product')
        ->where('id',$id)
        ->update([
            'name' => $request->name,
            'phi_nhan_nuoi' => $request->phi_nhan_nuoi,
            'loi_nhan' => $request->loi_nhuan,
            'phi_giam_gia' => $request->phi_giam_gia,
            'time' => $request->time,
            'image' => $imageName,
        ]);

        $alert='Sửa thành công';

        return redirect()->back()->with('alert',$alert); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('product')->where('id',$id)->delete();
        $alert='Xóa thành công';

        return redirect()->back()->with('alert',$alert); 
    }
}
