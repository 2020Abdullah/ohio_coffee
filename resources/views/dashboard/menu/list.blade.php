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
        <h3 class="card-title">بحث عن وجبة</h3>
    </div>
    <div class="card-body">
       <div class="box_action">
            <input type="text" class="form-control searchInput">
            <a href="{{ route('menu.add') }}" class="btn-icon-content btn btn-success waves-effect waves-float waves-light">
                 <i class="fa fa-plus"></i>
                 <span>إضافة منيو جديد</span> 
            </a>
       </div>
    </div>
</div>

<!-- category list -->
<div class="card">
    <div class="card-header">
        <p>عدد الوجبات : {{ $list_menu->count() }}</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>صورة</th>
                        <th>اسم الوجبة </th>
                        <th>اسم الوجبة بالإنجليزية</th>
                        <th>الوصف</th>
                        <th>السعر</th>
                        <th>التصنيف</th>
                        <th>الحالة</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list_menu as $menu)
                        <tr>
                            <td>
                                <img src="{{ asset($menu->image) }}" width="100" height="100" alt="img.jpg">
                            </td>
                            <td>{{ $menu->name_ar }}</td>
                            <td>{{ $menu->name_en }}</td>
                            <td>{{ $menu->desc == null ? 'لا يوجد' : $menu->desc}}</td>
                            <td>{{ $menu->price }}</td>
                            <td>{{ $menu->category->name }}</td>
                            <td>
                                @if ($menu->status == 1)
                                    <span class="badge bg-success">مفعل</span>
                                @else     
                                    <span class="badge bg-danger">غير مفعل</span>
                                @endif
                            </td>
                            <td>
                                <a class="editBtn btn btn-success mb-1 waves-effect waves-float waves-light" href="{{ route('menu.edit', $menu->id) }}">
                                    <i data-feather='edit'></i>
                                    <span>تعديل</span>
                                </a>
                                <a class="delBtn btn btn-danger mb-1 waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#deleteMenu" data-id="{{ $menu->id }}" href="#">
                                    <i data-feather='trash-2'></i>
                                    <span>حذف</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="8">لا يوجد منيو مضاف حتي الآن</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="page-num">
            {{ $list_menu->links() }}
        </div>
    </div>
</div>

<!-- models -->
@include('dashboard.menu.Mdel')

@endsection

@section('js')
<script>
    // delete menu 
    $(".delBtn").on('click', function(){
        let id = $(this).attr('data-id');
        $("#deleteMenu .id").val(id);
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
