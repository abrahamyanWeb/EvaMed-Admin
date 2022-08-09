<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CareerAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::all();
        return view('Admin.Career.index' , [
            'careers'=>$careers
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
            'field_am' => 'required',
            'field_ru' => 'required',
            'field_en' => 'required',
            'field_image' => 'required'
        ]);
        $input = $request->all();
        if ($field_image = $request->file('field_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $field_image->getClientOriginalExtension();
            $field_image->move($destinationPath, $profileImage);
            $input['field_image'] = "$profileImage";
        }
        Career::create($input);
        return redirect()->route('Admin.career')
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
        $careers = Career::find($id);
        return view('Admin.Career.edit' , [
            'careers' => $careers
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
        $careers = Career::find($id);

        $careers -> field_am = $request->field_am;
        $careers -> field_ru = $request->field_ru;
        $careers -> field_en = $request->field_en;
        $field_image = $request->file('field_image');

        if(!is_null($field_image)) {
            if(File::exists(public_path('/image/' . $careers -> field_image))) {
                File::delete(public_path('/image/') .$careers -> field_image);
            }
            $name = uniqid() . '.' . $field_image->getClientOriginalExtension();
            $field_image->move(public_path('/image'), $name);

            $careers->field_image = $name;
        }
        $careers -> save();
        return redirect()->route('Admin.career');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $careers = Career::find($id);
        if(File::exists(public_path('image/' . $careers->field_image))) {
            File::delete(public_path('image/') . $careers->field_image);
        }
        $careers -> delete();
        return back();
    }
}
