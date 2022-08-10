@extends('layouts.admin')
@section('title' , 'About Edit')
@section('content')
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                About Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.about.update' , $abouts->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <select name="about_directory" id="" class="form-control w-50 m-auto">
                        <option value="home_page">For Home Page</option>
                        <option value="about_page">For About Page</option>
                    </select>
                    <label>
                        <input type="text" value="{{ $abouts->about_desc_am}}" name="about_desc_am" id="">
                        <div class="label-text">About Description Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $abouts->about_desc_ru}}" name="about_desc_ru" id="">
                        <div class="label-text">About Description Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $abouts->about_desc_en}}" name="about_desc_en" id="">
                        <div class="label-text">About Description En</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('/image/'.$abouts->about_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="about_image"
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
