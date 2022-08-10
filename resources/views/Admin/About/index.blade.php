@extends('layouts.admin')
@section('title' , 'About')
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
                <h3 class="page-title">ADD ABOUT</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.about.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <select name="about_directory" id="" class="form-control w-50 m-auto">
                        <option value="home_page">For Home Page</option>
                        <option value="about_page">For About Page</option>
                    </select>
                    <label>
                        <input type="text" name="about_desc_am" id="" required>
                        <div class="label-text">About Description Am</div>
                    </label>
                    <label>
                        <input type="text" name="about_desc_ru" id="" required>
                        <div class="label-text">About Description Ru</div>
                    </label>
                    <label>
                        <input type="text" name="about_desc_en" id="" required>
                        <div class="label-text">About Description En</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="news_image"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="about_image"
                                id="news_image"
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
                        @foreach($abouts as $about)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_img">
                                        <img
                                            src="{{ asset('/image/'.$about -> about_image) }}"
                                            class="img-fluid"
                                            alt="{{ $about -> about_desc_am }}"
                                        >
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $about -> about_directory }}</p>
                                        <p>{{ $about -> about_desc_am }}</p>
                                        <p>{{ $about -> about_desc_ru }}</p>
                                        <p>{{ $about -> about_desc_en }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.about.edit',$about->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.about.destroy' , $about->id) }}"
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
@endsection
