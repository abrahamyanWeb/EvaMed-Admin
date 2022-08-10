@extends('layouts.admin')
@section('title','Home')
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
                <h3 class="page-title">ADD HOME CAROUSEL IMAGES</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.home.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="text-center mb-5">
                        <label
                            for="carousel_image"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="carousel_image"
                                id="carousel_image"
                                class="form-control"
                                hidden
                            >
                        </label>
                    </div>
                    <label class="mt-3">
                        <input type="text" name="carousel_image_title" id="" required>
                        <div class="label-text">Carousel Image Title</div>
                    </label>
                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="container" id="section_for_posts">
                    <div class="row" id="row_for_posts">
                        @foreach($carousel_images as $carousel_image)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_img">
                                        <img
                                            src="{{ asset('/image/'.$carousel_image -> carousel_image) }}"
                                            class="img-fluid"
                                            alt="{{ $carousel_image -> carousel_image_title }}"
                                        >
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $carousel_image -> carousel_image_title }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.home.edit',$carousel_image->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.home.destroy' , $carousel_image->id) }}"
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
                <h3 class="page-title">ADD HOME DATA</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.home.createData') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label class="mt-3">
                        <input type="text" name="home_data_address_am" id="" required>
                        <div class="label-text">Home Data Address Am</div>
                    </label>
                    <label class="mt-3">
                        <input type="text" name="home_data_address_ru" id="" required>
                        <div class="label-text">Home Data Address Ru</div>
                    </label>
                    <label class="mt-3">
                        <input type="text" name="home_data_address_en" id="" required>
                        <div class="label-text">Home Data Address En</div>
                    </label>

                    <label class="mt-3">
                        <input type="text" name="home_data_email" id="" required>
                        <div class="label-text">Home Data Email</div>
                    </label>
                    <label class="mt-3">
                        <input type="text" name="home_data_tel" id="" required>
                        <div class="label-text">Home Data Tel</div>
                    </label>
                    <label class="mt-3">
                        <input type="text" name="home_data_face_link" id="" required>
                        <div class="label-text">Home Data Facebook Link</div>
                    </label>
                    <label class="mt-3">
                        <input type="text" name="home_data_insta_link" id="" required>
                        <div class="label-text">Home Data Insta Link</div>
                    </label>
                    <label class="mt-3">
                        <input type="text" name="home_data_youtube_link" id="" required>
                        <div class="label-text">Home Data Youtube Link</div>
                    </label>


                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="container" id="section_for_posts">
                    <div class="row" id="row_for_posts">
                        @foreach($home_datas as $home_data)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_name">
                                        <p>{{ $home_data -> home_data_address_am }}</p>
                                        <p>{{ $home_data -> home_data_address_ru }}</p>
                                        <p>{{ $home_data -> home_data_address_en }}</p>
                                        <p>{{ $home_data -> home_data_email }}</p>
                                        <p>{{ $home_data -> home_data_tel }}</p>
                                        <p>{{ $home_data -> home_data_face_link }}</p>
                                        <p>{{ $home_data -> home_data_insta_link }}</p>
                                        <p>{{ $home_data -> home_data_youtube_link }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.home.editData',$home_data->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.home.destroyData.00' , $home_data->id) }}"
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
