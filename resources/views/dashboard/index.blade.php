@extends('layouts.app')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                إحصائيات  
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">عرض الإحصائيات</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('category.list') }}">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-2">عدد التصنيفات</h3>
                    <span class="h2">{{ $category_count }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('menu.list') }}">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-2">عدد الوجبات</h3>
                    <span class="h2">{{ $menu_count }}</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection