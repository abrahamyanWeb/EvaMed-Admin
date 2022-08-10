<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('Admin.About.index' , [
            'abouts' => $abouts
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
            'about_directory' => 'required',
            'about_desc_am' => 'required',
            'about_desc_ru' => 'required',
            'about_desc_en' => 'required',
            'about_image' => 'required'
        ]);
        $input = $request->all();
        if ($about_image = $request->file('about_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $about_image->getClientOriginalExtension();
            $about_image->move($destinationPath, $profileImage);
            $input['about_image'] = "$profileImage";
        }
        About::create($input);
        return redirect()->route('Admin.about')
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
        $abouts = About::find($id);
        return view('Admin.About.edit' , [
            'abouts'=>$abouts
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
        $abouts = About::find($id);

        $abouts -> about_directory = $request->about_directory;
        $abouts -> about_desc_am = $request->about_desc_am;
        $abouts -> about_desc_ru = $request->about_desc_ru;
        $abouts -> about_desc_en = $request->about_desc_en;

        $about_image = $request->file('about_image');

        if(!is_null($about_image)) {
            if(File::exists(public_path('/image/' . $abouts -> about_image))) {
                File::delete(public_path('/image/') .$abouts -> about_image);
            }
            $name = uniqid() . '.' . $about_image->getClientOriginalExtension();
            $about_image->move(public_path('/image'), $name);

            $abouts->about_image = $name;
        }
        $abouts -> save();
        return redirect()->route('Admin.about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts = About::find($id);
        if(File::exists(public_path('image/' . $abouts->about_image))) {
            File::delete(public_path('image/') . $abouts->about_image);
        }
        $abouts -> delete();
        return back();
    }
}
