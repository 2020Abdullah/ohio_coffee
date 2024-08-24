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
                <a class="nav-link" href="{{ route('contact') }}">
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
                <a class="nav-link active" href="{{ route('slider') }}">
                    <i data-feather='settings'></i>
                    <span class="fw-bold">إعدادت الملف الشخصي</span>
                </a>
            </li>
            
        </ul>

        <!-- pages setting -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">تعديل ملفك الشخصي</h4>
            </div>
            <div class="card-body py-2 my-25">
                <div class="pages-content">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label">اسمك</label>
                            <input type="text" name="name" value="{{ auth('web')->user()->name }}" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">بريدك الإلكتروني</label>
                            <input type="text" name="email" value="{{ auth('web')->user()->email }}" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">كلمة سر جديدة</label>
                            <input type="password" name="new_password" class="form-control">
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
