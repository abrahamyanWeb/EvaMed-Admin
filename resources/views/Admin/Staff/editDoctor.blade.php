@extends('layouts.admin')
@section('title' , 'Edit Staff')
@section('content')

    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                Staff Doctor Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.staff.update' , $doctors->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                @csrf
                @method('PUT')

                    <label>
                        <input type="text" value="{{ $doctors->doctor_name_am}}" name="doctor_name_am" id="">
                        <div class="label-text">Doctor Name Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $doctors->doctor_name_ru}}" name="doctor_name_ru" id="">
                        <div class="label-text">Doctor Name Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $doctors->doctor_name_en}}" name="doctor_name_en" id="">
                        <div class="label-text">Doctor Name En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $doctors->doctor_type_am }}" name="doctor_type_am" id="">
                        <div class="label-text">Doctor Type Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $doctors->doctor_type_ru }}" name="doctor_type_ru" id="">
                        <div class="label-text">Doctor Type Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $doctors->doctor_type_en }}" name="doctor_type_en" id="">
                        <div class="label-text">Doctor Type En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $doctors->doctor_unique }}" name="doctor_unique" id="">
                        <div class="label-text">Doctor Unique</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('/image/'.$doctors->doctor_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="doctor_image"
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

