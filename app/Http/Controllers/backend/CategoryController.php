<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        //return view('backend.pages.categoryList');
        //read 2nd
        $Category = Category::all();
        return view('backend.pages.categoryList', compact('Category'));
    }

    
    public function createForm()
    {
        return view('backend.pages.categoryForm');
    }


    public function submitForm(Request $request)
    {
        // create 1st then read
        Category::create([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);
        return redirect()->route('category.list')->with('message','Category Create Successfully.');
    }


    //edit
    public function editCategory($id)

    {
        $Category = Category::find($id);
        return view('backend.pages.categoryEdit', compact('Category'));
    }

    //view

    public function viewCategory($id)

    {
        $Category = Category::find($id);
        return view('backend.pages.categoryView', compact('Category'));
    }


    //Update

    public function updateCategory(Request $request, $id)
    {
        $Category = Category::find($id)->update([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);
        return redirect()->route('category.list')->with('message','Category Update Successfully.');
    }

    //delete

    public function deleteCategory($id)
    {
        $Category = Category::find($id)->delete();
        return redirect()->route('category.list');
    }
}
