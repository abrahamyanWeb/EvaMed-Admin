<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BioDoctors;
use App\Models\StaffDoctors;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class StaffAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = StaffDoctors::all();
        $doctors_bios = BioDoctors::all();
        return view('Admin.Staff.index' , [
            'doctors'=>$doctors,
            'doctors_bios'=>$doctors_bios
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
            'doctor_name_am' => 'required',
            'doctor_name_ru' => 'required',
            'doctor_name_en' => 'required',
            'doctor_type_am' => 'required',
            'doctor_type_ru' => 'required',
            'doctor_type_en' => 'required',
            'doctor_unique' => 'required',
            'doctor_image' => 'required'
        ]);
        $input = $request->all();
        if ($doctor_image = $request->file('doctor_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $doctor_image->getClientOriginalExtension();
            $doctor_image->move($destinationPath, $profileImage);
            $input['doctor_image'] = "$profileImage";
        }
        StaffDoctors::create($input);
        return redirect()->route('Admin.staff')
            ->with('success','Product created successfully.');

    }
    public function createBio(Request $request)
    {
        $request->validate([
            'doctor_unique' => 'required',
            'doctor_bio_am' => 'required',
            'doctor_bio_ru' => 'required',
            'doctor_bio_en' => 'required',
        ]);
        $input = $request->all();

        BioDoctors::create($input);
        return redirect()->route('Admin.staff')
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
        $doctors = StaffDoctors::find($id);
        return view('Admin.Staff.editDoctor' , [
            'doctors' => $doctors
        ]);
    }
    public function editBio($id)
    {
        $doctors_bios = BioDoctors::find($id);
        return view('Admin.Staff.editBio' , [
            'doctors_bios' => $doctors_bios
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
        $doctors = StaffDoctors::find($id);

        $doctors -> doctor_name_am = $request->doctor_name_am;
        $doctors -> doctor_name_ru = $request->doctor_name_ru;
        $doctors -> doctor_name_en = $request->doctor_name_en;
        $doctors -> doctor_type_am = $request->doctor_type_am;
        $doctors -> doctor_type_ru = $request->doctor_type_ru;
        $doctors -> doctor_type_en = $request->doctor_type_en;
        $doctors -> doctor_unique = $request->doctor_unique;
        $doctor_image = $request->file('doctor_image');

        if(!is_null($doctor_image)) {
            if(File::exists(public_path('/image/' . $doctors->doctor_image))) {
                File::delete(public_path('/image/').$doctors->doctor_image);
            }
            $name = uniqid() . '.' . $doctor_image->getClientOriginalExtension();
            $doctor_image->move(public_path('/image'), $name);

            $doctors-> doctor_image = $name;
        }
        $doctors -> save();
        return redirect()->route('Admin.staff');
     }
     public function updateBio(Request $request, $id)
    {
        $doctors_bios = BioDoctors::find($id);

        $doctors_bios -> doctor_bio_am = $request->doctor_bio_am;
        $doctors_bios -> doctor_bio_ru = $request->doctor_bio_ru;
        $doctors_bios -> doctor_bio_en = $request->doctor_bio_en;
        $doctors_bios -> doctor_unique = $request->doctor_unique;

        $doctors_bios -> save();
        return redirect()->route('Admin.staff');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctors = StaffDoctors::find($id);
        if(File::exists(public_path('image/' . $doctors->doctor_image))) {
            File::delete(public_path('image/') . $doctors->doctor_image);
        }
        $doctors -> delete();
        return back();
    }
    public function destroyBio($id)
    {
        $doctors_bios = BioDoctors::find($id);

        $doctors_bios -> delete();
        return back();
    }
}
