<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Services;
use App\Models\StaffDoctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();
        $services_categorys = ServiceCategory::all();
        return view('Admin.Service.index' , [
            'services'=>$services,
            'services_categorys'=>$services_categorys
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
            'service_name_am' => 'required',
            'service_name_ru' => 'required',
            'service_name_en' => 'required',
            'current_service' => 'required',
            'service_image' => 'required'
        ]);
        $input = $request->all();
        if ($service_image = $request->file('service_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $service_image->getClientOriginalExtension();
            $service_image->move($destinationPath, $profileImage);
            $input['service_image'] = "$profileImage";
        }
        Services::create($input);
        return redirect()->route('Admin.service')
            ->with('success','Product created successfully.');
    }
    public function createCategory(Request $request)
    {
        $request->validate([
            'service_category_am' => 'required',
            'service_category_ru' => 'required',
            'service_category_en' => 'required',
            'service_current_category'=>'required'
        ]);
        $input = $request->all();

        ServiceCategory::create($input);
        return redirect()->route('Admin.service')
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Services::find($id);

        return view('Admin.Service.editService' , [
            'services' => $services
        ]);
    }
    public function editCategory($id)
    {
        $services = Services::find($id);
        $services_categorys = ServiceCategory::find($id);
        return view('Admin.Service.editCategory' , [
            'services' => $services,
            'services_categorys'=>$services_categorys
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
        $services = Services::find($id);

        $services -> service_name_am = $request->service_name_am;
        $services -> service_name_ru = $request->service_name_ru;
        $services -> service_name_en = $request->service_name_en;
        $services -> current_service = $request->current_service;
//        $services -> service_unique = $request->service_unique;
        $services_image = $request->file('service_image');

        if(!is_null($services_image)) {
            if(File::exists(public_path('/image/' . $services -> service_image))) {
                File::delete(public_path('/image/') .$services->service_image);
            }
            $name = uniqid() . '.' . $services_image->getClientOriginalExtension();
            $services_image->move(public_path('/image'), $name);

            $services->service_image = $name;
        }
        $services -> save();
        return redirect()->route('Admin.service');
    }
    public function updateCategory(Request $request, $id)
    {
        $services_categorys = ServiceCategory::find($id);

        $services_categorys -> service_category_am = $request->service_category_am;
        $services_categorys -> service_category_ru = $request->service_category_ru;
        $services_categorys -> service_category_en = $request->service_category_en;
        $services_categorys -> service_current_category = $request->service_current_category;

        $services_categorys -> save();
        return redirect()->route('Admin.service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Services::find($id);
        if(File::exists(public_path('image/' . $services->service_image))) {
            File::delete(public_path('image/') . $services->service_image);
        }
        $services -> delete();
        return back();
    }
    public function destroyCategory($id)
    {
        $services_categorys = ServiceCategory::find($id);
        $services_categorys -> delete();
        return back();
    }
}
