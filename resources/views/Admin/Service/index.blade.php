@extends('layouts.admin')
@section('title','Service')
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
                <h3 class="page-title">ADD SERVICE</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.service.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <input type="text" name="service_name_am" id="" required>
                        <div class="label-text">Service Name Am</div>
                    </label>
                    <label>
                        <input type="text" name="service_name_ru" id="" required>
                        <div class="label-text">Service Name Ru</div>
                    </label>
                    <label>
                        <input type="text" name="service_name_en" id="" required>
                        <div class="label-text">Service Name En</div>
                    </label>
                    <label>
                        <input type="text" name="current_service" id="" required>
                        <div class="label-text">Current Service</div>
                    </label>
{{--                    <label>--}}
{{--                        <input type="text" name="service_unique" id="" required>--}}
{{--                        <div class="label-text">Service Unique</div>--}}
{{--                    </label>--}}
                    <div class="text-center">
                        <label
                            for="service_image"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="service_image"
                                id="service_image"
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
                        @foreach($services as $service)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_img">
                                        <img
                                            src="{{ asset('/image/'.$service->service_image) }}"
                                            class="img-fluid"
                                            alt="{{ $service -> service_name_am }}"
                                        >
                                    </div>
                                    <div class="for_name">
                                        <p>{{ $service -> service_name_am }}</p>
                                        <p>{{ $service -> service_name_ru }}</p>
                                        <p>{{ $service -> service_name_en }}</p>
                                    </div>
                                    <div class="for_type">
                                        <p>{{ $service -> current_service }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.service.edit' ,$service->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.service.destroy' , $service->id) }}"
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
                <h3 class="page-title">ADD SERVICE CATEGORY</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.serviceCategory.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="service_category_am" id="" required>
                        <div class="label-text">Service Category Am</div>
                    </label>
                    <label>
                        <input type="text" name="service_category_ru" id="" required>
                        <div class="label-text">Service Category Ru</div>
                    </label>
                    <label>
                        <input type="text" name="service_category_en" id="" required>
                        <div class="label-text">Service Category En</div>
                    </label>
                    <label>
                        <input type="text" name="service_current_category" id="" required>
                        <div class="label-text">Service Current Category</div>
                    </label>

                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="container" id="section_for_posts">
                    <div class="row" id="row_for_posts">
                        @foreach($services_categorys as $services_category)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_name">
                                        <p>{{ $services_category -> service_category_am }}</p>
                                        <p>{{ $services_category -> service_category_ru }}</p>
                                        <p>{{ $services_category -> service_category_en }}</p>
                                    </div>
                                    <div class="for_type">
                                        <p>{{ $services_category -> service_current_category }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.serviceCategory.edit' ,$services_category->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.serviceCategory.destroy' , $services_category->id) }}"
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
                <h3 class="page-title">ADD SERVICE CATEGORY LIST</h3>
            </div>
            <div class="col-md-12 for-forms">
                <form
                    action="{{ route('Admin.serviceCategoryList.create') }}"
                    method="post"
                    class="w-100 admin-add-form"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="service_category_list_am" id="" required>
                        <div class="label-text">Service Category List Am</div>
                    </label>
                    <label>
                        <input type="text" name="service_category_list_ru" id="" required>
                        <div class="label-text">Service Category List Ru</div>
                    </label>
                    <label>
                        <input type="text" name="service_category_list_en" id="" required>
                        <div class="label-text">Service Category List En</div>
                    </label>
                    <select name="service_category_list_unique" id="" class="form-control w-50 m-auto">
                        @foreach($services_categorys as $services_category)
                            <option value="{{ $services_category -> service_current_category }}">
                                {{ $services_category -> service_current_category }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" id="new_btn" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="container" id="section_for_posts">
                    <div class="row" id="row_for_posts">
                        @foreach($services_categorys_lists as $services_categorys_list)
                            <div class="col-md-3" id="col_for_posts">
                                <div class="for_content">
                                    <div class="for_name">
                                        <p>{{ $services_categorys_list -> service_category_list_am }}</p>
                                        <p>{{ $services_categorys_list -> service_category_list_ru }}</p>
                                        <p>{{ $services_categorys_list -> service_category_list_en }}</p>
                                    </div>
                                    <div class="for_type">
                                        <p>{{$services_categorys_list -> service_category_list_unique }}</p>
                                    </div>
                                    <div class="for_buttons">
                                        <a
                                            class="edit_btn"
                                            href="{{ route('Admin.serviceCategoryList.edit' ,$services_categorys_list->id) }}"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('Admin.serviceCategoryList.destroy' , $services_categorys_list->id) }}"
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
