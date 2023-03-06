<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function myProfile(){
        return view('backend.profile.profile');
    }

    public function profileupdate(Request $request){

       
        $fileName = (auth()->user()->image);
        if ($request->hasFile('image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads/user', $fileName);
        }

        $User=User::find(auth()->user()->id)->update([
            'image'=>$fileName,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone
            

        ]);

        notify()->success('Profile','Update Successfully');

        return redirect()->back();

    }

}
