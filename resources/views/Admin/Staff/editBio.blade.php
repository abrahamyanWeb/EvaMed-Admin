@extends('layouts.admin')
@section('title','Bio Edit')
@section('content')
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                Staff Doctor Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.staffBio.update' , $doctors_bios->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
{{--                        <input type="text" value="{{ $doctors_bios->doctor_bio_am}}" name="doctor_bio_am" id="">--}}
                        <div class="label-text mt-3">Doctor Bio Am</div>
                        <textarea name="doctor_bio_am" id="" cols="60" rows="5">
                            {{ $doctors_bios->doctor_bio_am}}
                        </textarea>
                    </label>
                    <label>
                        <div class="label-text mt-5">Doctor Bio Ru</div>
                        <textarea name="doctor_bio_ru" id="" cols="60" rows="5">
                            {{ $doctors_bios->doctor_bio_ru}}
                        </textarea>
                    </label>
                    <label>
                        <div class="label-text mt-5">Doctor Bio En</div>
                        <textarea name="doctor_bio_en" id="" cols="60" rows="5">
                            {{ $doctors_bios->doctor_bio_en}}
                        </textarea>
                    </label>
                    <label>
                        <input type="text" value="{{ $doctors_bios->doctor_unique }}" name="doctor_unique" id="">
                        <div class="label-text">Doctor Unique</div>
                    </label>

                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
