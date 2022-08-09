@extends('layouts.admin')
@section('title' , 'Career Edit')
@section('content')
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                Service Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.career.update' , $careers->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
                        <input type="text" value="{{ $careers->field_am}}" name="field_am" id="">
                        <div class="label-text">Field Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $careers->field_ru}}" name="field_ru" id="">
                        <div class="label-text">Field Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $careers->field_en}}" name="field_en" id="">
                        <div class="label-text">Field En</div>
                    </label>

                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('/image/'.$careers->field_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="field_image"
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
