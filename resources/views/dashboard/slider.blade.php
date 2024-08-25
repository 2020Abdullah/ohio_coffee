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
                    <li class="breadcrumb-item">
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
                <a class="nav-link active" href="{{ route('slider') }}">
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

        <!-- slider setting -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">إدارة سلايدر الصور</h4>
            </div>
            <div class="card-body py-2 my-25">
                <div class="container">
                    @error('images.*')
                    <div class="alert alert-danger">
                        <div class="alert-body">
                            <span>{{ $message }}</span>
                        </div>
                    </div>
                    @enderror

                    <div class="addSlider mb-2">
                        <button class="btn-icon-content btn btn-success waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addSlider">
                            <i class="fa fa-plus"></i>
                            <span>إضافة صورة جديدة</span> 
                       </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>الترتيب</th>
                                <th>الصورة</th>
                                <th>إجراء</th>
                            </tr>
                            <tr>
                                @foreach ($images as $image)
                                    <tr>
                                        <td>{{ $image->order }}</td>
                                        <td>
                                            <img src="{{ asset($image->image_path) }}" width="80" height="80" alt="slider">
                                        </td>
                                        <td>
                                            <a class="editBtn btn btn-success mb-1 waves-effect waves-float waves-light" href="#" data-bs-toggle="modal" data-order="{{ $image->order }}" data-path="{{ asset($image->image_path) }}" data-id="{{ $image->id }}" data-bs-target="#editSlider">
                                                <i data-feather='edit'></i>
                                                <span>تعديل</span>
                                            </a>
                                            <a class="delBtn btn btn-danger mb-1 waves-effect waves-float waves-light" data-id="{{ $image->id }}" href="#" data-bs-toggle="modal" data-id="{{ $image->id }}" data-bs-target="#deleteSlider">
                                                <i data-feather='trash-2'></i>
                                                <span>حذف</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div> 

                    <!-- model add slider images -->
                    <div class="modal modal-slide-in fade" id="addSlider" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('slider.add') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">إضافة صور جديدة</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="mb-2">
                                            <label class="form-label">ترتيب الظهور</label>
                                            <input type="number" name="order" class="form-control">
                                        </div>
                                        <div class="addImage">
                                            <input type="file" name="image" id="fileInput" accept="image/*" style="display: none;">
                                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light" onclick="document.getElementById('fileInput').click();">
                                                إضافة صور جديدة
                                            </button>
                                            <div id="imagePreview" class="image-preview"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success me-1 data-submit waves-effect waves-float waves-light">حفظ البيانات</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- model edit slider image -->
                    <div class="modal modal-slide-in fade" id="editSlider" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content pt-0">
                                <form method="POST" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" class="id">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل الصورة</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    </div>
                                    <div class="modal-body mt-2">
                                        <img src="" class="modalImage" style="max-width: 100%; height: 100px;" alt="sliderImg">
                                        <div class="mb-1">
                                            <label class="form-label">ترتيب الظهور</label>
                                            <input type="text" class="form-control order" name="order">
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">تعديل الصورة</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success me-1 data-submit waves-effect waves-float waves-light">حفظ البيانات</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- model delete confirm slider -->
                    <div class="modal fade" id="deleteSlider" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">تنبيه هام !</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('slider.delete') }}">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="id" class="id">
                                        <div class="modal-body">
                                            <div class="mb-1">
                                                <p>هل تريد بالفعل حذف هذه الصورة ؟</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger me-1 data-submit waves-effect waves-float waves-light">تأكيد</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--/ slider setting -->
    </div>
</div>
@endsection

@section('js')

<script>
    // upload images with preview
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const imagePreviewContainer = document.getElementById('imagePreview');
        imagePreviewContainer.innerHTML = ''; // Clear previous images

        const files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.className = 'preview-image';
                imagePreviewContainer.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        }
    });

    // edit image
    $(".editBtn").on('click', function(){
        let id = $(this).attr('data-id');
        let order = $(this).attr('data-order');
        var imageUrl = $(this).data('path');
        $("#editSlider .id").val(id);
        $("#editSlider .order").val(order);
        $('#editSlider .modalImage').attr('src', imageUrl);

    })

    // delete image
    $(".delBtn").on('click', function(){
        let id = $(this).attr('data-id');
        $("#deleteSlider .id").val(id);
    })
</script>
@endsection
