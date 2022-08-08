@extends('layouts.admin')
@section('title','Edit Service Category')
@section('content')

    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                Service Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.serviceCategory.update' , $services_categorys->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
                        <input type="text" value="{{ $services_categorys->service_category_am}}" name="service_category_am" id="">
                        <div class="label-text">Service Category Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services_categorys->service_category_ru}}" name="service_category_ru" id="">
                        <div class="label-text">Service Category Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services_categorys->service_category_en}}" name="service_category_en" id="">
                        <div class="label-text">Service Category En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services_categorys->service_current_category }}" name="service_current_category" id="">
                        <div class="label-text">Service Current Category</div>
                    </label>

                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>

@endsection
