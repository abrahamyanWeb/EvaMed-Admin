@extends('layouts.admin')
@section('title','Staff')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">ADD OUR STAFF</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.staff.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="doctor_name_am" id="" required>
                        <div class="label-text">Doctor Name Am</div>
                    </label>
                    <label>
                        <input type="text" name="doctor_name_ru" id="" required>
                        <div class="label-text">Doctor Name Ru</div>
                    </label>
                    <label>
                        <input type="text" name="doctor_name_en" id="" required>
                        <div class="label-text">Doctor Name En</div>
                    </label>
                    <label>
                        <input type="text" name="doctor_type_am" id="" required>
                        <div class="label-text">Doctor Type Am</div>
                    </label>
                    <label>
                        <input type="text" name="doctor_type_ru" id="" required>
                        <div class="label-text">Doctor Type Ru</div>
                    </label>
                    <label>
                        <input type="text" name="doctor_type_en" id="" required>
                        <div class="label-text">Doctor Type En</div>
                    </label>
                    <label>
                        <input type="text" name="doctor_unique" id="" required>
                        <div class="label-text">Doctor Unique</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="eva_logo"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="doctor_image"
                                id="eva_logo"
                                class="form-control"
                                hidden
                            >
                        </label>
                    </div>
                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="container" id="section_for_posts">
                    <div class="row" id="row_for_posts">
                        @foreach($doctors as $doctor)
                            <div class="col-md-3" id="col_for_posts">
                               <div class="for_content">
                                   <div class="for_img">
                                       <img
                                           src="{{ asset('/image/'.$doctor->doctor_image) }}"
                                           class="img-fluid"
                                           alt="{{ $doctor -> doctor_name_am }}"
                                       >
                                   </div>
                                   <div class="for_name">
                                       <p>{{ $doctor -> doctor_name_am }}</p>
                                       <p>{{ $doctor -> doctor_name_ru }}</p>
                                       <p>{{ $doctor -> doctor_name_en }}</p>
                                   </div>
                                   <div class="for_type">
                                       <p>{{ $doctor -> doctor_type_am }}</p>
                                       <p>{{ $doctor -> doctor_type_ru }}</p>
                                       <p>{{ $doctor -> doctor_type_en }}</p>
                                   </div>
                                   <div class="for_type">
                                       <p>{{ $doctor -> doctor_unique }}</p>
                                   </div>
                                   <div class="for_buttons">
                                       <a
                                           class="edit_btn"
                                           href="{{ route('Admin.staff.edit' ,$doctor->id) }}"
                                       >
                                           Edit
                                       </a>
                                       <form
                                           action="{{ route('Admin.staff.destroy' , $doctor->id) }}"
                                           method="POST"
                                           enctype="multipart/form-data"
                                       >
                                           @method('DELETE')
                                           @csrf
                                           <button type="submit" class="btn btn-danger del_btn">Delete</button>
                                       </form>
                                   </div>
                               </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">ADD OUR STAFF</h3>
            </div>
            <div class="col-md-12 for-forms">

                <form
                    action="{{ route('Admin.staffBio.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                @csrf

                    <label>
                        <input type="text" name="doctor_unique" id="" required>
                        <div class="label-text">Doctor Unique</div>
                    </label>
                    <label class="mt-5">
                        <div class="label-text mt-3">Doctor Bio Am</div>
                        <textarea name="doctor_bio_am" id="" cols="60" rows="5" required></textarea>
                    </label>
                    <label class="mt-5">
                        <div class="label-text mt-3">Doctor Bio Ru</div>
                        <textarea name="doctor_bio_ru" id="" cols="60" rows="5" required></textarea>

                    </label>
                    <label class="mt-5">
                        <div class="label-text mt-3">Doctor Bio En</div>
                        <textarea name="doctor_bio_en" class="mt-0" id="" cols="60" rows="5" required></textarea>

                    </label>
                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>

                </form>
            </div>
            <div class="col-md-12">
                <div class="container" id="section_for_posts">
                    <div class="row" id="row_for_posts">
                        @foreach($doctors_bios as $doctors_bio)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_type">
                                        <p>{{ $doctors_bio -> doctor_unique }}</p>
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $doctors_bio -> doctor_bio_am }}</p>
                                        <p>{{ $doctors_bio -> doctor_bio_ru }}</p>
                                        <p>{{ $doctors_bio -> doctor_bio_en }}</p>
                                    </div>

                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.staffBio.edit' ,$doctors_bio->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.staffBio.destroy' , $doctors_bio->id) }}"
                                            method="POST"
                                            enctype="multipart/form-data"
                                        >
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger del_btn">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
