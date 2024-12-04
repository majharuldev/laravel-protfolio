<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

class HomeController extends Controller
{


    public function homeSlide()
    {

        $homeslide = HomeSlider::find(1);

        return view('admin.HomeSlide.home_slide_all', compact('homeslide'));
    }




    public function updateSlide(Request $request)
{
    $homeslide = $request->id;

    if ($request->file('home_slide')) {
        $image = $request->file('home_slide');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/home_slide'), $name_gen);

        $save_url = 'upload/home_slide/' . $name_gen;

        HomeSlider::findorFail($homeslide)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'video_url' => $request->video_url,
            'home_slide' => $save_url, // Fixed line
        ]);

        $notification = array(
            'message' => 'Home Slide Update With Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    } else {
        HomeSlider::findorFail($homeslide)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'video_url' => $request->video_url,
        ]);

        $notification = array(
            'message' => 'Home Slide Update Without Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}

}
