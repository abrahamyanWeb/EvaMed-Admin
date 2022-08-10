<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BioDoctors;
use App\Models\HomeCarousel;
use App\Models\HomeData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel_images = HomeCarousel::all();
        $home_datas = HomeData::all();
        return view('Admin.Home.index' , [
            'carousel_images' => $carousel_images ,
            'home_datas' => $home_datas
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'carousel_image_title' => 'required',
            'carousel_image' => 'required'
        ]);
        $input = $request->all();
        if ($carousel_image = $request->file('carousel_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $carousel_image->getClientOriginalExtension();
            $carousel_image->move($destinationPath, $profileImage);
            $input['carousel_image'] = "$profileImage";
        }
        HomeCarousel::create($input);
        return redirect()->route('Admin.home')
            ->with('success','Product created successfully.');
    }

    public function createData(Request $request)
    {
        $request->validate([
            'home_data_address_am' => 'required',
            'home_data_address_ru' => 'required',
            'home_data_address_en' => 'required',
            'home_data_email' => 'required',
            'home_data_tel' => 'required',
            'home_data_face_link' => 'required',
            'home_data_insta_link' => 'required',
            'home_data_youtube_link' => 'required',
        ]);
        $input = $request->all();

        HomeData::create($input);
        return redirect()->route('Admin.home')
            ->with('success','Product created successfully.');

    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $carousel_images = HomeCarousel::find($id);
        return view('Admin.Home.edit' , [
            'carousel_images' => $carousel_images
        ]);
    }
    public function editData($id)
    {
        $home_datas = HomeData::find($id);
        return view('Admin.Home.editData' , [
            'home_datas' => $home_datas
        ]);
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
        $carousel_images = HomeCarousel::find($id);

        $carousel_images -> carousel_image_title = $request-> carousel_image_title;

        $carousel_imgs = $request->file('carousel_image');

        if(!is_null($carousel_imgs)) {
            if(File::exists(public_path('/image/' . $carousel_images -> carousel_image))) {
                File::delete(public_path('/image/') .$carousel_images -> carousel_image);
            }
            $name = uniqid() . '.' . $carousel_imgs->getClientOriginalExtension();
            $carousel_imgs->move(public_path('/image'), $name);

            $carousel_images->carousel_image = $name;
        }
        $carousel_images -> save();
        return redirect()->route('Admin.home');
    }
    public function updateData(Request $request, $id)
    {
        $home_datas = HomeData::find($id);

        $home_datas -> home_data_address_am = $request-> home_data_address_am;
        $home_datas -> home_data_address_ru = $request-> home_data_address_ru;
        $home_datas -> home_data_address_en = $request-> home_data_address_en;
        $home_datas -> home_data_email = $request-> home_data_email;
        $home_datas -> home_data_tel = $request-> home_data_tel;
        $home_datas -> home_data_face_link = $request-> home_data_face_link;
        $home_datas -> home_data_insta_link = $request-> home_data_insta_link;
        $home_datas -> home_data_youtube_link = $request-> home_data_youtube_link;

        $home_datas -> save();

        return redirect()->route('Admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel_images = HomeCarousel::find($id);
        if(File::exists(public_path('image/' . $carousel_images->carousel_image))) {
            File::delete(public_path('image/') . $carousel_images->carousel_image);
        }
        $carousel_images -> delete();
        return back();
    }
    public function destroyData($id)
    {
        $home_datas = HomeData::find($id);
        $home_datas -> delete();
        return back();
    }
}
