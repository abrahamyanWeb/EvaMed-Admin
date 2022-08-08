@extends('layouts.admin')
@section('title' , 'Service Edit')
@section('content')

    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                Service Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.service.update' , $services->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
                        <input type="text" value="{{ $services->service_name_am}}" name="service_name_am" id="">
                        <div class="label-text">Service Name Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services->service_name_ru}}" name="service_name_ru" id="">
                        <div class="label-text">Service Name Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services->service_name_en}}" name="service_name_en" id="">
                        <div class="label-text">Service Name En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services->current_service }}" name="current_service" id="">
                        <div class="label-text">Current Service</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services->service_unique }}" name="service_unique" id="">
                        <div class="label-text">Service Unique</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('/image/'.$services->service_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="service_image"
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
@endsection()
