@extends('layouts.app')

@section('content')
<!-- show all errors -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <div class="alert-body">
                <span>{{$error}}</span>
            </div>
        </div>
    @endforeach
@endif

<!-- search category -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">بحث عن تصنيف</h3>
    </div>
    <div class="card-body">
       <div class="box_action">
            <input type="text" class="form-control searchInput">
            <button class="btn-icon-content btn btn-success waves-effect waves-float waves-light addCate" data-bs-toggle="modal" data-bs-target="#createCate">
                 <i class="fa fa-plus"></i>
                 <span>تصنيف جديد</span> 
            </button>
       </div>
    </div>
</div>

<!-- category list -->
<div class="card">
    <div class="card-header">
        <p>عدد التصنيفات : {{ $list_category->count() }}</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>الترتيب</th>
                        <th>التصنيف</th>
                        <th>الحالة</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list_category as $cate)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cate->name }}</td>
                            <td>
                                @if ($cate->status == 1)
                                    <span class="badge bg-success">مفعل</span>
                                @else     
                                    <span class="badge bg-danger">غير مفعل</span>
                                @endif
                            </td>
                            <td>
                                <a class="editBtn btn btn-success mb-1 waves-effect waves-float waves-light" href="#" data-bs-toggle="modal" data-name="{{ $cate->name }}" data-id="{{ $cate->id }}" data-bs-target="#editCate">
                                    <i data-feather='edit'></i>
                                    <span>تعديل</span>
                                </a>
                                <a class="delBtn btn btn-danger mb-1 waves-effect waves-float waves-light" data-id="{{ $cate->id }}" href="#" data-bs-toggle="modal" data-id="{{ $cate->id }}" data-bs-target="#deleteCate">
                                    <i data-feather='trash-2'></i>
                                    <span>حذف</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="4">لا توجد تصنيفات مضافة حتي الآن</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="page-num">
            {{ $list_category->links() }}
        </div>
    </div>
</div>

<!-- models -->
@include('dashboard.category.models')

@endsection

@section('js')
<script>

    // edit category 
    $(".editBtn").on('click', function(){
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $("#editCate .id").val(id);
        $("#editCate .name").val(name);
    })

    // delete category 
    $(".delBtn").on('click', function(){
        let id = $(this).attr('data-id');
        $("#deleteCate .id").val(id);
    })

    // filter search
    $(".searchInput").on('keyup', function(){
        let value = $(this).val().toLowerCase();
        $(".table tbody tr").filter(function(){
            return $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        })
    })
</script>
@endsection
