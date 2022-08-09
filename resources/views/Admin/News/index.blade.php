@extends('layouts.admin')
@section('title' , 'News')
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
                <h3 class="page-title">ADD News</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.news.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <input type="text" name="news_title_am" id="" required>
                        <div class="label-text">News Title Am</div>
                    </label>
                    <label>
                        <input type="text" name="news_title_ru" id="" required>
                        <div class="label-text">News Title Ru</div>
                    </label>
                    <label>
                        <input type="text" name="news_title_en" id="" required>
                        <div class="label-text">News Title En</div>
                    </label>
                    <label>
                        <input type="text" name="news_desc_am" id="" required>
                        <div class="label-text">News Desc Am</div>
                    </label>
                    <label>
                        <input type="text" name="news_desc_ru" id="" required>
                        <div class="label-text">News Desc Ru</div>
                    </label>
                    <label>
                        <input type="text" name="news_desc_en" id="" required>
                        <div class="label-text">News Desc En</div>
                    </label>
                    <label>
                        <input type="text" name="news_unique" id="" required>
                        <div class="label-text">News Unique</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="news_image"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="news_image"
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
                        @foreach($news as $new)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_img">
                                        <img
                                            src="{{ asset('/image/'.$new->news_image) }}"
                                            class="img-fluid"
                                            alt="{{ $new -> news_title_am }}"
                                        >
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $new -> news_title_am }}</p>
                                        <p>{{ $new -> news_title_ru }}</p>
                                        <p>{{ $new -> news_title_en }}</p>
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $new -> news_desc_am }}</p>
                                        <p>{{ $new -> news_desc_ru }}</p>
                                        <p>{{ $new -> news_desc_en }}</p>
                                    </div>
                                    <div class="for_type">
                                        <p>{{ $new -> news_unique }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.news.edit',$new->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.news.destroy' , $new->id) }}"
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
                <h3 class="page-title">ADD NEWS CURRENT</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.newsCurrent.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <input type="text" name="news_current_title_am" id="" required>
                        <div class="label-text">News Current Title Am</div>
                    </label>
                    <label>
                        <input type="text" name="news_current_title_ru" id="" required>
                        <div class="label-text">News Current Title Ru</div>
                    </label>
                    <label>
                        <input type="text" name="news_current_title_en" id="" required>
                        <div class="label-text">News Current Title En</div>
                    </label>
                    <label>
                        <input type="text" name="news_current_desc_am" id="" required>
                        <div class="label-text">News Current Desc Am</div>
                    </label>
                    <label>
                        <input type="text" name="news_current_desc_ru" id="" required>
                        <div class="label-text">News Current Desc Ru</div>
                    </label>
                    <label>
                        <input type="text" name="news_current_desc_en" id="" required>
                        <div class="label-text">News Current Desc En</div>
                    </label>
                    <label>
                        <input type="text" name="news_current_unique" id="" required>
                        <div class="label-text">News Current Unique</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="news_current_image"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="news_current_image"
                                id="news_current_image"
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
                        @foreach($news_currents as $news_current)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_img">
                                        <img
                                            src="{{ asset('/image/'.$news_current->news_current_image) }}"
                                            class="img-fluid"
                                            alt="{{ $news_current -> news_current_title_am }}"
                                        >
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $news_current -> news_current_title_am }}</p>
                                        <p>{{ $news_current -> news_current_title_ru }}</p>
                                        <p>{{ $news_current -> news_current_title_en }}</p>
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $news_current -> news_current_desc_am }}</p>
                                        <p>{{ $news_current -> news_current_desc_ru }}</p>
                                        <p>{{ $news_current -> news_current_desc_en }}</p>
                                    </div>
                                    <div class="for_type">
                                        <p>{{ $news_current -> news_current_unique }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.newsCurrent.edit',$news_current->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.news.destroy' , $news_current->id) }}"
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
