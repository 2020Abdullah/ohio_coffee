@extends('layouts.app')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                إضافة قائمة طعام جديدة  
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">بيانات الوجبة</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<!-- add Novel -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">إضافة قائمة طعام جديدة</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label class="form-label" for="name_ar">اسم الوجبة بالعربي</label>
                <input type="text" class="form-control" name="name_ar" id="name_ar">
                @error('name_ar')
                    <div class="alert alert-danger mt-2" role="alert">
                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="name_en">اسم الوجبة بالإنجليزية</label>
                <input type="text" class="form-control" name="name_en" id="name_en">
                @error('name_en')
                    <div class="alert alert-danger mt-2" role="alert">
                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="name_en">السعر</label>
                <div class="d-flex">
                    <input type="text" class="form-control" name="price" id="price">
                    <input type="text" class="form-control disabled" style="width: 10%;text-align: center;" value="جنيه" readonly>
                </div>
                @error('price')
                    <div class="alert alert-danger mt-2" role="alert">
                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="desc">الوصف (اختيارى)</label>
                <textarea class="form-control" name="desc" id="desc"></textarea>
            </div>
            <div class="mb-2">
                <label class="form-label" for="image">صورة الطعام</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <div class="alert alert-danger mt-2" role="alert">
                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="category_id">التصنيف</label>
                <select class="form-select" name="category_id">
                        @foreach ($list_category as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger mt-2" role="alert">
                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="status">الحالة</label>
                <select class="form-select" name="status" id="status">
                       <option value="1">متاحة</option>
                       <option value="0">غير متاحة</option>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label">ترتيب الظهور</label>
                <input type="number" class="form-control" name="order">
            </div>
            <div class="mb-2">
                <button type="submit" class="btn-icon-content btn btn-success waves-effect waves-float waves-light">
                    <i data-feather='save'></i>
                    <span>حفظ البيانات</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
