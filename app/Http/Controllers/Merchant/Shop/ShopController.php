<?php

namespace App\Http\Controllers\Merchant\Shop;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Upazila;
use App\Models\Admin\Shop\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Image;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return view('marchant.shop.shop', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();

        return view('marchant.shop.addshop', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');

        if($photo){
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'mimes:png,jpg,gif,bmp|max:1024',
            'address' => 'required',
            'trade_license' => 'required',
        ]);

        $fileExtention = $photo->getClientOriginalExtension();
        $fileName = date('Ymdhis') . '.' . $fileExtention;

        Image::make($photo)->save(public_path('uploads/shop/') . $fileName);

        Shop::create([
            'name'        => $request->name,
            'description' => $request->description,
            'photo'       => 'uploads/shop/' . $fileName,
            'address' =>    $request->address,
            'trade_license' => $request->trade_license,
            'author'      => 'merchant',
            'author_id'   => Auth::guard('marchant')->user()->id,
            'market_id'   =>  $request->market_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'   => $request->upazila_id,
        ]);

        return redirect()->route('shop.index');
        }else{

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'trade_license' => 'required',
        ]);

        Shop::create([
            'name'        => $request->name,
            'description' => $request->description,
            'address' =>    $request->address,
            'trade_license' => $request->trade_license,
            'author'      => 'merchant',
            'author_id'   => Auth::guard('marchant')->user()->id,
            'market_id'   =>  $request->market_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'   => $request->upazila_id,
        ]);

        return redirect()->route('shop.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::where('id', $id)->get()->first();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        return view('marchant.shop.edit', compact('shop', 'divisions', 'districts', 'upazilas'));
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
        $photo = $request->file('photo');

        if($photo){
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'mimes:png,jpg,gif,bmp|max:1024',
            'address' => 'required',
            'trade_license' => 'required',
        ]);

        $old_photo = $request->old_photo;

        $fileExtention = $photo->getClientOriginalExtension();
        $fileName = date('Ymdhis') . '.' . $fileExtention;

        Image::make($photo)->save(public_path('uploads/shop/') . $fileName);

        $stall = [
            'name'        => $request->name,
            'description' => $request->description,
            'photo'       => 'uploads/shop/' . $fileName,
            'address' =>    $request->address,
            'trade_license' => $request->trade_license,
            'author'      => 'merchant',
            'author_id'   => Auth::guard('marchant')->user()->id,
            'market_id'   =>  $request->market_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'   => $request->upazila_id,
            ];

        $update = Shop::where('id', $id)->update($stall);
        return redirect()->route('shop.index');

        }else{

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'trade_license' => 'required',
        ]);

        $stall = [
            'name'        => $request->name,
            'description' => $request->description,
            'address' =>    $request->address,
            'trade_license' => $request->trade_license,
            'author'      => 'merchant',
            'author_id'   => Auth::guard('marchant')->user()->id,
            'market_id'   =>  $request->market_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'   => $request->upazila_id,
            ];

        $update = Shop::where('id', $id)->update();
        return redirect()->route('shop.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::where('id', $id)->get()->first();
        $delete = Shop::where('id', $id)->delete();
        // Session::flash('delete');
        return redirect()->route('shop.index');
    }
}
