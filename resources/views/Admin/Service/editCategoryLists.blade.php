@extends('layouts.admin')
@section('title' , 'Edit Category Lists')
@section('content')
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 page-title pb-5">
                Service Edit
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.serviceCategoryList.update' , $services_categorys_lists->id) }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
                        <input type="text" value="{{ $services_categorys_lists->service_category_list_am}}" name="service_category_list_am" id="">
                        <div class="label-text">Service Category Lists Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services_categorys_lists->service_category_list_ru}}" name="service_category_list_ru" id="">
                        <div class="label-text">Service Category Lists Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services_categorys_lists->service_category_list_en}}" name="service_category_list_en" id="">
                        <div class="label-text">Service Category Lists En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $services_categorys_lists->service_category_list_unique }}" name="service_category_list_unique" id="">
                        <div class="label-text">Service Current Category Unique</div>
                    </label>

                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>

@endsection
