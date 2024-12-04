<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;

class AdminController extends Controller
{
    public function destroy(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification=array(
            'message'=>'Logout Succesfuly',
              'alert-type'=>  'success'

        );




        return redirect('/login')->with($notification);


    }







    public function Profile (){

             $id=Auth::user()->id;
             $adminData=User::find($id);

             return view('admin.admin_profile_view',compact('adminData'));

    }



    public function edit (){

        $id=Auth::user()->id;
        $editAdmin=User::find($id);

        return view('admin.edit_profile_view',compact('editAdmin'));

}


public function store (Request $request){

    $id=Auth::user()->id;
    $data=User::find($id);

    $data->name=$request->name;
    $data->email=$request->email;


    if($request->file('profile_image')){

            $file=$request->file('profile_image');

            $filename= date ('YdmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);  // Added filename for the move method
            $data['profile_image'] = $filename;

    }


             $data->save();

        $notification=array(
            'message'=>'profile Update Succesfuly',
              'alert-type'=>  'success'

        );


     return redirect()->route('admin.profile')->with($notification);

}



  public function changePassword(){

      return view('admin.admin_change_password');

  }


  public function updatePassword(Request $request){


          $valideData=$request->validate([

            'oldpassword'=>  'required',
            'newpassword'=>  'required',
            'confirmpassword'=>  'required|same:newpassword'


          ]);




          $hashpassword=Auth::user()->password;
         if(Hash::check($request->oldpassword,$hashpassword)){

            $users=User::find(Auth::id());
            $users->password= bcrypt($request->newpassword);
              $users->save();

              session()->flash('message','Password changed Sucessfully');



              return redirect()->back();

         }else{


            session()->flash('message','Old Password Not Match');

            return redirect()->back();
         }



  }



}
