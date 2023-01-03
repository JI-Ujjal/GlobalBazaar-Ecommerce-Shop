<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list()
    {
        //return view('backend.pages.brandList');
        $Brand = Brand::all();
        return view('backend.pages.brandList', compact('Brand'));
    }


    public function createForm()
    {
        return view('backend.pages.brandCreateForm');
    }


    public function submitForm(Request $request)
    {
        Brand::create([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);
        return redirect()->route('brand.list')->with('message', 'Brand Update Successfully.');
    }

    //edit
    public function editBrand($id)
    {
        $Brand = Brand::find($id);
        return view('backend.pages.brandEdit', compact('Brand'));
    }

    //update
    public function updateBrand(Request $request, $id)
    {
        $Brand = Brand::find($id)->update([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);

        //session
        return redirect()->route('brand.list')->with('message', 'Brand Update Successfully.');
    }

    public function deleteBrand($id)
    {
        $Brand = Brand::find($id)->delete();
        return redirect()->back();
    }

    public function viewBrand($id)
    {
        $Brand = Brand::find($id);
        return view('backend.pages.brandView', compact('Brand'));
    }
}
