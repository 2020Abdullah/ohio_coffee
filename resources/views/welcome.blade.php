<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OHIO menu</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- links css -->
    <link rel="stylesheet" href="{{ asset('assets/css-rtl/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css-rtl/bootstrap.rtl.min.css') }}">
    <!-- welcome css -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
</head>

<body>
    <!-- model googleMap -->
    <div class="modal fade" id="location" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">موقع الشركة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.1604164623177!2d31.300789875555424!3d30.08959177490095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f6821677047%3A0x5baa7a74d822578b!2sOhio%2022%20Cafe!5e0!3m2!1sen!2seg!4v1724878568107!5m2!1sen!2seg" width="100%" height="450" style="border:0;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">حسناً</button>
            </div>
        </div>
        </div>
    </div>

    <!-- scroll to top -->
        <button id="scrollToTop" class="scroll-to-top">
            <i class="fas fa-hand-point-up"></i>
        </button>
    <!-- header -->
    <header>
        <div class="container">
            <div class="header-top">

                <nav>
                    <ul style="padding: 0;">
                        <li>
                            <a href="https://www.{{ $contact->facebook_link }}" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/{{ $contact->phone }}" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.{{ $contact->instgram_link }}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.{{ $contact->instgram_link }}" data-bs-toggle="modal" data-bs-target="#location">
                                <i class="fa fa-map-marker"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="logo">
                    <img src="{{ asset($contact->logo) }}" alt="logo.jpg">
                </div>
            </div>
        </div>
    </header>

    <!-- slider images -->
    <div class="main-content">
        <div id="sliderContainer" class="slider-container">
            <div class="slider-overlay"></div>
            @foreach($images as $image)
            <img src="{{ asset($image->image_path) }}" class="slider-image">
            @endforeach
        </div>
    </div>

    <!-- ads hero -->
    <div class="marquee-container">
        <div class="marquee-content">
            {{ $contact->info }}
        </div>
    </div>
    {{-- <div class="ads-hero">
        <h2>{{ $contact->title }}</h2>
    <p>{{ $contact->info }}</p>
    </div> --}}

    <!-- menu food-->
    <div class="shop" id="shop">
        <div class="shop-box">
            <div class="shop-header">
                <ul class="menu-category">
                    <div class="category-item">
                        <button class="btn category-btn active" data-filter="*">All</button>
                    </div>
                    @foreach ($list_category as $cate)
                    <div class="category-item">
                        <button class="btn category-btn" data-filter="{{ $cate->id }}">{{ $cate->name }}</button>
                    </div>
                    @endforeach
                </ul>
            </div>
            <div class="menu_area">
                <div class="container">
                    <div class="row">
                        @foreach ($list_category as $cate)
                        <div class="col-12 item" data-id="{{ $cate->id }}" style="padding: 0px;">
                            <div class=" row">
                                <div class="col-md-12">
                                    <div class="category-header">
                                        <div class="category-item">
                                            <h3>{{ $cate->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding: 0px;">
                                    <div class="row">
                                        @foreach ($list_menu as $menu)
                                        @if ($menu->category_id == $cate->id)
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="padding: 4px;">
                                            <div class="card">
                                                <div class="card-image">
                                                    <img src="{{ asset($menu->image) }}">
                                                    <div class="category">
                                                        <i class="fa fa-star"></i>
                                                        <h3>{{ $menu->category->name }}</h3>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="card-body" style="background-image: url({{ asset('assets/images/BG.jpg') }})">
                                                    <h4 class="heading1">{{ $menu->name_ar }}</h4>
                                                    <h3 class="heading2">{{ $menu->name_en }}</h3>
                                                    @if ($menu->desc !== null)
                                                    <span class="desc">{{ $menu->desc }}</span>
                                                    @endif
                                                    <h2 class="heading3">{{ $menu->price }} L.E</h2>
                                                    <!-- <a class="link" href="#">{{ $contact->facebook_link }}</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- contact -->
    <div class="contact" id="contact" style="background-image: url({{ asset('assets/images/BG.jpg') }})">
        <div class="container">
            <div class="contact-header">
                <i class="fa fa-star"></i>
                <h3>Contact</h3>
                <i class="fa fa-star"></i>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="contact-image">
                        <img src="{{ asset($contact->logo) }}" alt="contact">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="contact-info">
                        <span>الإسم : {{ $contact->title }}</span>
                        <span>العنوان : {{ $contact->address }}</span>
                        <span>رقم الهاتف : {{ $contact->phone }}</span>
                        @if ($contact->facebook_link !== null)
                        <span>صفحتنا علي الفيسبوك : <a href="https://www.{{ $contact->facebook_link }}">{{ $contact->facebook_link }}</a></span>
                        @endif
                        @if ($contact->instgram_link !== null)
                        <span>صفحتنا علي انستجرام : <a href="https://www.{{ $contact->instgram_link }}">{{ $contact->instgram_link }}</a></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="footer-box">
            <div class="copyright">
                <p style="margin-bottom: 0;">Copyright &copy; 2024 OHIO All rights Perceived </p>
                <p style="margin-bottom: 0; display:flex; justify-content: center;"><a href="https://www.facebook.com/DgytosSoftware/" target="_blank" style="color: #fff;"> Dgytos Software :</a> Made With Love by </p>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            // تصفية البطاقات بناءً على id
            $('.category-btn').on('click', function() {
                $(".category-btn").removeClass('active');
                $(this).addClass('active');

                var $grid = $('.menu_area').isotope({
                    itemSelector: '.item',
                    layoutMode: 'fitRows',
                    isOriginLeft: false

                });

                var filterValue = $(this).attr('data-filter');

                // إذا كان filterValue يساوي "*"، سيتم عرض كل البطاقات
                if (filterValue === '*') {
                    $grid.isotope({
                        filter: '*'
                    });
                } else {
                    // تصفية البطاقات بناءً على id
                    $grid.isotope({
                        filter: '[data-id="' + filterValue + '"]'
                    });
                }

            });

            let slideIndex = 0;
            const slides = document.querySelectorAll('.slider-image');

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove('active');
                    if (i === index) {
                        slide.classList.add('active');
                    }
                });
            }

            function nextSlide() {
                slideIndex = (slideIndex + 1) % slides.length;
                showSlide(slideIndex);
            }

            function startSlider() {
                showSlide(slideIndex);
                setInterval(nextSlide, 3000); // تغيير الصورة كل 3 ثوانٍ
            }

            window.onload = startSlider;

            // إظهار الزر عند التمرير لأسفل
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) { // يظهر الزر عندما يتم التمرير لأكثر من 100 بكسل
                    $('#scrollToTop').addClass('show');
                } else {
                    $('#scrollToTop').removeClass('show');
                }
            });

            // التمرير إلى أعلى الصفحة عند النقر على الزر
            $('#scrollToTop').click(function() {
                $('html, body').animate({scrollTop: 0}, 500); // التمرير بسلاسة إلى الأعلى
            });

        });
    </script>
</body>

</html>
