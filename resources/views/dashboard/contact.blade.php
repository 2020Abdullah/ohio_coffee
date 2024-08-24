@extends('layouts.app')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                صفحة الإعدادات 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">إعدادت الموقع</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- setting pages -->
<div class="row">
    <div class="col-12">
        <!-- tabs setting -->
        <ul class="nav nav-pills mb-2">
            <!-- site setting -->
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('contact') }}">
                    <i data-feather='settings'></i>
                    <span class="fw-bold">إعدادت الموقع</span>
                </a>
            </li>
            <!-- slider image setting -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('slider') }}">
                    <i data-feather='settings'></i>
                    <span class="fw-bold">إعدادت السلايدر</span>
                </a>
            </li>
            <!-- profile setting -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i data-feather='settings'></i>
                    <span class="fw-bold">إعدادت الملف الشخصي</span>
                </a>
            </li>
            
        </ul>

        <!-- pages setting -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">تعديل معلومات الإتصال</h4>
            </div>
            <div class="card-body py-2 my-25">
                <div class="pages-content">
                    <form method="POST" action="{{ route('contact.update') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($contact == null)
                            <div class="mb-1">
                                <label class="form-label">اسم النشاط التجارى</label>
                                <input name="title" type="text" class="form-control">
                                @error('title')
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label">وصف النشاط التجارى</label>
                                <textarea class="form-control" name="info" cols="5" rows="5"></textarea>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">العنوان</label>
                                <input name="address" type="text" class="form-control">
                                @error('address')
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label">رقم الهاتف</label>
                                <input name="phone" type="text" class="form-control">
                                @error('phone')
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <div class="alert-body"><strong>{{ $message }}</strong></div>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label">لينك صفحة الفيسبوك إن وجد</label>
                                <input name="facebook_link" type="text" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">لينك صفحة انستجرام </label>
                                <input name="instgram_link" type="text" class="form-control">
                            </div>
                        @else 
                            <div class="mb-1">
                                <label class="form-label">اسم النشاط التجارى</label>
                                <input name="title" type="text" value="{{ $contact->title }}" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">وصف النشاط التجارى</label>
                                <textarea class="form-control" name="info" cols="5" rows="5">{{ $contact->info }}</textarea>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">العنوان</label>
                                <input name="address" value="{{ $contact->address }}"  type="text" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">رقم الهاتف</label>
                                <input name="phone" value="{{ $contact->phone }}"  type="text" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">لينك صفحة الفيسبوك </label>
                                <input name="facebook_link" value="{{ $contact->facebook_link }}" type="text" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">لينك صفحة انستجرام </label>
                                <input name="instgram_link" value="{{ $contact->instgram_link }}" type="text" class="form-control">
                            </div>
                        @endif
                        <div class="mb-1">
                            <label class="form-label">اللوجو</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-success waves-effect waves-float waves-light">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/ pages setting -->
    </div>
</div>
@endsection
