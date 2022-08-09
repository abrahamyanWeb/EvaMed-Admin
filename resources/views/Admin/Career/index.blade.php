@extends('layouts.admin')
@section('title' , 'Career')
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
                <h3 class="page-title">ADD VACANCY</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.career.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="field_am" id="" required>
                        <div class="label-text">Field Am</div>
                    </label>
                    <label>
                        <input type="text" name="field_ru" id="" required>
                        <div class="label-text">Field Ru</div>
                    </label>
                    <label>
                        <input type="text" name="field_en" id="" required>
                        <div class="label-text">Field En</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="news_image"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="field_image"
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
                        @foreach($careers as $career)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_img">
                                        <img
                                            src="{{ asset('/image/'.$career -> field_image) }}"
                                            class="img-fluid"
                                            alt="{{ $career -> field_am }}"
                                        >
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $career -> field_am }}</p>
                                        <p>{{ $career -> field_ru }}</p>
                                        <p>{{ $career -> field_en }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.career.edit',$career->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.career.destroy' , $career->id) }}"
                                            method="POST"
                                            enctype="multipart/form-data"
                                        >
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger del_btn">Delete</button>
                                        </form>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
        </div>
    </div>
    @csrf
@endsection
