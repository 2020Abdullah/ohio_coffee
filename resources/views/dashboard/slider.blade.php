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
                <h4 class="card-title">إضافة صور لعرضها في الواجهة</h4>
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
                    
                    <div class="slider-container">
                        @foreach($images as $image)
                            <img src="{{ asset($image->image_path) }}" class="slider-image">
                        @endforeach
                        <button class="slider-button prev" onclick="prevSlide()">&#10094;</button>
                        <button class="slider-button next" onclick="nextSlide()">&#10095;</button>
                    </div>

                    <form method="POST" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12"></div>
                            <div class="addImage">
                                <input type="file" name="images[]" id="fileInput" accept="image/*" multiple style="display: none;">
                                <button type="button" class="btn btn-primary waves-effect waves-float waves-light" onclick="document.getElementById('fileInput').click();">
                                    إضافة صور جديدة
                                </button>
                                <div id="imagePreview" class="image-preview"></div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success waves-effect waves-float waves-light">حفظ البيانات</button>
                        </div>
                    </form>
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

    // show images

    let slideIndex = 0;
    const slides = document.querySelectorAll('.slider-image');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? '1' : '0';
        });
    }

    function nextSlide() {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    function prevSlide() {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
        showSlide(slideIndex);
    }

    showSlide(slideIndex); // Initialize the first slide
</script>
@endsection
