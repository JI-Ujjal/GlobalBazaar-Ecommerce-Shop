<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function list()
    {
        //return view('backend.pages.subCategoryList');
        $Subcategory = Subcategory::all();
        return view('backend.pages.subcategory.subCategoryList', compact('Subcategory'));
    }


    public function createForm()
    {
        return view('backend.pages.subcategory.subCategoryCreateForm');
    }


    public function submitForm(Request $request)
    {
        //return view('backend.pages.subCategoryForm');
        Subcategory::create([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);
        return redirect()->route('sub.category.list')->with('message','Sub-Category Create Successfully.');
    }

    //edit
    public function editSubCategory($id)
    {
        $Subcategory = Subcategory::find($id);
        return view('backend.pages.subcategory.subCategoryEdit', compact('Subcategory'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        $Subcategory = Subcategory::find($id)->update([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);
        return redirect()->route('sub.category.list');
    }

    //view
    public function viewSubCategory($id)
    {
        $Subcategory = Subcategory::find($id);
        return view('backend.pages.subcategory.subCategoryView', compact('Subcategory'));
    }

    //delete
    public function deleteSubCategory($id)
    {
        $SubCategory = Subcategory::find($id)->delete();
        return redirect()->back();
    }
}
