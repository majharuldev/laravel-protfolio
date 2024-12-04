<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About(){

      $aboutpage= About::find(1);

      return view('admin.About.about_page', compact('aboutpage'));

    }



public function FrontAbout(){


    return view('frontend.about.about_page');
}




    public function updateAbout(Request $request){


        $AboutId = $request->id;

    if ($request->file('about_image')) {
        $image = $request->file('about_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/about_image'), $name_gen);

        $save_url = 'upload/about_image/' . $name_gen;

        About::findorFail($AboutId)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'about_image' => $save_url, // Fixed line
        ]);

        $notification = array(
            'message' => 'About  Update With Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    } else {
        About::findorFail($AboutId)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
        ]);

        $notification = array(
            'message' => 'About Page Update Without Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}



}
