@extends('layouts.admin')
@section('title' , 'News Edit')
@section('content')

    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                Service Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.news.update' , $news->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
                        <input type="text" value="{{ $news->news_title_am}}" name="news_title_am" id="">
                        <div class="label-text">News Title Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news->news_title_ru}}" name="news_title_ru" id="">
                        <div class="label-text">News Title Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news->news_title_en}}" name="news_title_en" id="">
                        <div class="label-text">News Title En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news->news_desc_am}}" name="news_desc_am" id="">
                        <div class="label-text">News Desc Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news->news_desc_ru}}" name="news_desc_ru" id="">
                        <div class="label-text">News Desc Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news->news_desc_en}}" name="news_desc_en" id="">
                        <div class="label-text">News Desc En</div>
                    </label>

                    <label>
                        <input type="text" value="{{ $news->news_unique }}" name="news_unique" id="">
                        <div class="label-text">Current Service</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('/image/'.$news->news_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="news_image"
                                id="img"
                                class="form-control"
                                hidden
                            >
                        </label>
                    </div>

                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>



    {{--    --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#img').on('change', function (e) {
                const blobUrl = URL.createObjectURL(e.target.files[0])
                $('#preview').attr('src', blobUrl)
            })

        })
    </script>

@endsection
