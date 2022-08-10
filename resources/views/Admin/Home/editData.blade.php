@extends('layouts.admin')
@section('title' , 'Home Data Edit')
@section('content')
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                About Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.home.updateData' , $home_datas->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
                        <input type="text" value="{{ $home_datas->home_data_address_am}}" name="home_data_address_am" id="">
                        <div class="label-text">Home Data Address Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $home_datas->home_data_address_ru}}" name="home_data_address_ru" id="">
                        <div class="label-text">Home Data Address Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $home_datas->home_data_address_en}}" name="home_data_address_en" id="">
                        <div class="label-text">Home Data Address En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $home_datas->home_data_email}}" name="home_data_email" id="">
                        <div class="label-text">Home Data Email</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $home_datas->home_data_tel}}" name="home_data_tel" id="">
                        <div class="label-text">Home Data Tel</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $home_datas->home_data_face_link}}" name="home_data_face_link" id="">
                        <div class="label-text">Facebook Link</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $home_datas->home_data_insta_link}}" name="home_data_insta_link" id="">
                        <div class="label-text">Insta Link</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $home_datas->home_data_youtube_link}}" name="home_data_youtube_link" id="">
                        <div class="label-text">Youtube Link</div>
                    </label>

                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>

@endsection
