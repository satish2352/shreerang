@extends('website.layouts.master')
@section('content')
<section>
     <!-- Slider start -->
     <section class="slider-area-2 relative">
        <div class="owl-carousel slider-2">
            <div class="item">
                <div class="silder-img" id="sliderbk1" style="background-image: url('{{ asset('website/assets/img/banner/HOME_PAGE.png')}}');" data-overlay="7">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="slider-content z-10">
                                    {{-- <h5 class="line-head">
                              25 years of experience
                            <span class="line  after"></span>
                          </h5> --}}
                                    <h1 class="banner-head-2 f-700 mt-25 mb-35 mt-xs-20 mb-xs-30">Effortless Efficiency: Transform your material handling experience</h1>
                                    {{-- <a href="#" class="btn btn-square">Learn More<i class="fas fa-long-arrow-alt-right ml-20"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="silder-img" style="background-image: url('{{ asset('website/assets/img/banner/banner_2a.jpg')}}');" data-overlay="7">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="slider-content z-10">
                                    {{-- <h5 class="line-head">
                                        1000+ Happy Clients
                                        <span class="line  after"></span>
                                    </h5> --}}
                                    <h1 class="banner-head-2 f-700 mt-25 mb-35 mt-xs-20 mb-xs-30"> Discover durability like never before with our robust solutions</h1>
                                    {{-- <a href="#" class="btn btn-square">Learn More<i class="fas fa-long-arrow-alt-right ml-20"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="silder-img" id="sliderbk1" style="background-image: url('{{ asset('website/assets/img/banner/HOME_PAGE.png')}}');" data-overlay="7">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="slider-content z-10">
                                    {{-- <h5 class="line-head">
                                        25 years of experience
                                    <span class="line  after"></span>
                                </h5> --}}
                                    <h1 class="banner-head-2 f-700 mt-25 mb-35 mt-xs-20 mb-xs-30">Elevate your business operations with our innovative designs</h1>
                                    {{-- <a href="#" class="btn btn-square">Learn More<i class="fas fa-long-arrow-alt-right ml-20"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="slide-social-outer transform-v-center z-5">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 w-100">
                        <div class="slide-social d-none d-lg-block">
                            <ul class="social-icons">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="slider-control z-5">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="dots-slider">

                        </div>
                    </div>
                    <div class="col-lg-6 text-right d-none d-lg-block">
                        <div class="nav-slider d-flex justify-content-end">
                            <a href="#" class="slider-btn slides-left flex-center">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <a href="#" class="slider-btn slides-right flex-center">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider end -->

     <!-- title start -->
     <section class="callback-area" data-overlay="9">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 m-4 wow fadeInDown">
                        <h1 class="white">Our Products</h1>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- title end -->

       <!-- products  start -->
<div class="">
     <section class="team-area bg-blue-op-11 pt-20 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="team-2-each card relative border shadow-3">
                    <div class="product_img text-center p-3">
                        <h3 class="f-700 p-3">TAILOR</h3>
                        <a ><img src="{{ asset('website/assets/img/products/Ellipse 7.png')}}" alt=""></a>
                    </div>
                        <div class="team-hover-div procard text-center transition-3">
                            {{-- <h4 class="white f-700"><a href="#">TAILOR</a></h4> --}}
                            <!-- <p class="green mb-0">Co Founder</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="team-2-each card relative border shadow-3">
                        <div class="product_img text-center p-3">
                            <h3 class="f-700 p-3">PLATFORM</h3>
                            <a><img src="{{ asset('website/assets/img/products/Ellipse 6.png')}}" alt=""></a>
                        </div>
                        <div class="team-hover-div procard text-center transition-4">
                            {{-- <h5 class="white f-700"><a href="#">PLATFORM</a></h5> --}}
                            <!-- <p class="green mb-0">Marketing Manager</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="team-2-each card relative border shadow-3">
                    <div class="product_img text-center p-3">
                        <h3 class="f-700 p-3">PLATS</h3>
                        <a><img src="{{ asset('website/assets/img/products/Ellipse 5.png')}}" alt=""></a>
                    </div>
                        <div class="team-hover-div procard text-center transition-4">
                            {{-- <h5 class="white f-700"><a href="#">PLATS</a></h5> --}}
                            <!-- <p class="green mb-0">Web Designer</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="team-2-each card relative border shadow-3">
                    <div class="product_img text-center p-3">
                        <h3 class="f-700 p-3">PLATFORM</h3>
                        <a><img src="{{ asset('website/assets/img/products/Ellipse 6.png')}}" alt=""></a>
                    </div>
                        <div class="team-hover-div procard text-center transition-4">
                            {{-- <h5 class=" f-700"><a href="#">TAILOR</a></h5> --}}
                            <!-- <p class="green mb-0">Finance Manager</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="team-2-each card relative border shadow-3">
                    <div class="product_img text-center p-3">
                        <h3 class="f-700 p-3">TAILOR</h3>
                        <a><img src="{{ asset('website/assets/img/products/Ellipse 7.png')}}" alt=""></a>
                    </div>
                        <div class="team-hover-div procard text-center transition-4">
                            {{-- <h5 class="white f-700"><a href="#">PLATFORM</a></h5> --}}
                            <!-- <p class="green mb-0">Web Designer</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="team-2-each card relative border shadow-3">
                    <div class="product_img text-center p-3">
                        <h3 class="f-700 p-3">PLATS</h3>
                        <a><img src="{{ asset('website/assets/img/products/Ellipse 5.png')}}" alt=""></a>
                    </div>
                        <div class="team-hover-div procard text-center transition-4">
                            {{-- <h5 class="white f-700"><a href="#">PLATS</a></h5> --}}
                            <!-- <p class="green mb-0">Web Designer</p> -->
                        </div>
                    </div>
                </div>
                                
            </div>
            <div class="row text-center">
                    <div class="col-lg-9 col-md-6"></div>
                    <div class="col-lg-3 col-md-6">

                        <a href="{{url('/product')}}" class="btn btn-round">View All Products</a>
                    </div>
                </div>
        </div>
    </section>
</div>
   
    <!-- Products end -->


        <!-- services start -->
        <section class="servicebk pt-40 pb-40" data-overlay="9">
        <div class="container">
            <div class="row">
                    <div class="col-xl-12">
                        <div class="fancy-head text-center relative z-5 mb-40 wow fadeInDown">
                            <h1 class="white">Our Services</h1>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                        <div class="exp-cta pr-50 pr-lg-00">
                            <h2 class="white f-600 mb-10">
                                <span class="">01</span>
                                Woodworking
                                <span class="green"></span>
                            </h2>
                            <p class="white mb-55 mb-md-30 pr-60 pr-md-00">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                        <div class="exp-cta pr-50 pr-lg-00">
                            <h2 class="white f-600 mb-10">
                                <span class="">02</span>
                                Metalworking
    
                            </h2>
                            <p class="white mb-55 mb-md-30 pr-60 pr-md-00">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
                            <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                        <div class="exp-cta pr-50 pr-lg-00">
                            <h2 class="white f-600 mb-10">
                                <span class="">03</span>
                                Woodworking <span class="green"></span>
                            </h2>
                            <p class="white mb-55 mb-md-30 pr-60 pr-md-00">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
                            <!-- <a href="services.php" class="btn btn-round mt-10">View All Services</a> -->
                        </div>
                    </div>
                
            </div>
            <div class="row">
                    <div class="col-lg-9"></div>
                    <div class="col-lg-3 z-5 text-center text-lg-left wow fadeIn">
                    <div class="exp-cta pr-50 pr-lg-00">

                        <a href="{{url('/services')}}" class="btn btn-round mt-10">View All Services</a>
                    </div>
                </div>      
            </div>
        </div>
    </section>
    <!-- services end -->

      <!-- How we work  -->
      <section class="pt-20" data-overlay="9">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="fancy-head text-center relative z-5 mb-40 wow fadeInDown">
                            <h1>How we work</h1>
                        </div>
                    </div>
                </div>        
            </div>
        </section>
      <section>
        <div class="container pt-10 pb-10">
            <div class="row">
                <div class="col-xl-4">
                    <div class="text-center">
                        <h2 class="f-600 mb-10"><span class="btn btn-round"><h3 class="white">01 </h3></span> Request</h2>
                        <img src="{{ asset('website/assets/img/icons/request.png')}}" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore facere reiciendis adipisci accusantium, aut unde officiis eveniet minima</p>
                    </div>
                </div>
                
                <div class="col-xl-4">
                    <div class="pb-12 text-center">
                    <h2 class="f-600 mb-10"><span class="btn btn-round"><h3 class="white">02 </h3></span> Develop</h2>
                        <img src="{{ asset('website/assets/img/icons/develop.png')}}"  alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore facere reiciendis adipisci accusantium, aut unde officiis eveniet minima</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="pb-12 text-center ">
                    <h2 class="f-600 mb-10"><span class="btn btn-round"><h3 class="white">03 </h3></span> Install</h2>
                        <img src="{{ asset('website/assets/img/icons/install.png')}}"  alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore facere reiciendis adipisci accusantium, aut unde officiis eveniet minima</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end  How we work-->

     <!-- Testimonial area start -->
     <section class="testimonials-2 reviw pt-30 pb-20">
        <div class="container">
            <div class="row align-items-end mb-30">
                <div class="col-lg-7 col-md-12 text-center text-lg-left">
                    <div class="fancy-head left-al wow fadeInLeft">
                        {{-- <h5 class="line-head mb-15">
                        <span class="line before d-lg-none"></span>
                            Testimonials
                        <span class="line after"></span>
                        </h5> --}}
                        <h1> Our Clients Review</h1>
                    </div>
                </div>
                {{-- <div class="col-lg-5 text-center text-lg-right">
                    <div class="arrow-navigation mb-15 mt-md-20 wow fadeInRight">
                        <a href="#" class="nav-slide slide-left testi-2">
                            <img src="{{ asset('website/assets/img/icons/ar_lt.png')}}" alt="">
                        </a>
                        <a href="#" class="nav-slide slide-right testi-2">
                            <img src="{{ asset('website/assets/img/icons/ar_rt.png')}}" alt="">
                        </a>
                    </div>
                </div> --}}
                <!-- <div class="col-12">
                    <div class="hr-2 bg-blue opacity-1 mt-45"></div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="owl-carousel owl-theme testimonial-2-slide  wow fadeIn">
                        <div class="item">
                            <div class="each-quote-2 pl-20 pr-sm-00 card" style="height: 350px; border-top:15px solid #243772;">
                                <!-- <ul class="stars-rate mb-5" data-starsactive="5">
                                    <li class="text-md-left text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul> -->
                                <h4 class="f-700 mb-20 pt-20">Best Service Ever</h4>
                                <p class="mb-35 pb-10"> jhruios  Quisque dapibus lacus non pulvinar lobortis. Cras odio dolor, pulvinar id ligula non, congue aliquam ve.</p>
                                <div class="client-2-img d-flex align-items-center fixed-bottom justify-content-md-start justify-content-center">
                                    <div class="img-div mr-30 pb-10">
                                        <div class="client-image">
                                            <img src="{{ asset('website/assets/img/testimonial/client1.jpg')}}" class=" rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="client-text-2 mb-10">
                                        <h6 class="client-name green fs-17 f-700">John Doe</h6>
                                        <p class="mb-0 fs-13 f-500">CEO, Abc Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="each-quote-2 pl-20 pr-sm-00 card" style="height: 350px; border-top:15px solid #243772;">
                                <!-- <ul class="stars-rate mb-5" data-starsactive="5">
                                    <li class="text-md-left text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul> -->
                                <h4 class="f-700 mb-20 pt-20">100% Recommended</h4>
                                <p class="mb-35 pb-10">Etiam mattis posuere sem, a bibendum nulla congue nec. Donec eget metus nisi. Suspendisse potenti.safsdgd thukevf wdynj sfhyj Pellentesque sed sem sodales, malesuada sapien ut, rutrum sem.</p>
                                <div class="client-2-img d-flex align-items-center fixed-bottom  justify-content-md-start justify-content-center">
                                    <div class="img-div mr-30 pb-10">
                                        <div class="client-image">
                                            <img src="{{ asset('website/assets/img/testimonial/client2.jpg')}}" class=" rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="client-text-2 mb-10">
                                        <h6 class="client-name green fs-17 f-700">Jessica David</h6>
                                        <p class="mb-0 fs-13 f-500">CEO, Abc Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="each-quote-2 pl-20 pr-sm-00 card" style="height: 350px; border-top:15px solid #243772;">
                                <!-- <ul class="stars-rate mb-5" data-starsactive="5">
                                    <li class="text-md-left text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul> -->
                                <h4 class="f-700 mb-20 pt-20">Bizz is the Best</h4>
                                <p class="mb-35 pb-10">Maecenas dignissim in dolor in blandit. eros vel lorem tempor malesuada quis efficitur erat. Nullam nec purus tempus, posuere elit non
                                </p>
                                <div class="client-2-img d-flex align-items-center fixed-bottom  justify-content-md-start justify-content-center">
                                    <div class="img-div mr-30 pb-10">
                                        <div class="client-image">
                                            <img src="{{ asset('website/assets/img/testimonial/client3.jpg')}}" class=" rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="client-text-2 mb-10">
                                        <h6 class="client-name green fs-17 f-700">Sara Mary</h6>
                                        <p class="mb-0 fs-13 f-500">CEO, Abc Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="each-quote-2 pl-20 pr-sm-00 card" style="height: 350px; border-top:15px solid #243772;">
                                <!-- <ul class="stars-rate mb-5" data-starsactive="5">
                                    <li class="text-md-left text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul> -->
                                <h4 class="f-700 mb-20 pt-20">Best Service Ever</h4>
                                <p class="mb-35 pb-10">Quisque enim ipsum, commodo et ven enatis gdghc jhytgv uhjbf jgfjg rutrum, luctus in enim. Quisque dapibus lacus non pulvinar lobortis. Cras odio dolor, pulvinar id ligula non, congue aliquam ve.</p>
                                <div class="client-2-img d-flex align-items-center fixed-bottom  justify-content-md-start justify-content-center">
                                    <div class="img-div mr-30 pb-10">
                                        <div class="client-image">
                                            <img src="{{ asset('website/assets/img/testimonial/client1.jpg')}}" class=" rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="client-text-2 mb-10">
                                        <h6 class="client-name green fs-17 f-700">John Doe</h6>
                                        <p class="mb-0 fs-13 f-500">CEO, Abc Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="each-quote-2 pl-20 pr-sm-00 card" style="height: 350px; border-top:15px solid #243772;">
                                <!-- <ul class="stars-rate mb-5" data-starsactive="5">
                                    <li class="text-md-left text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul> -->
                                
                                <h4 class="f-700 mb-20 pt-20">100% Recommended</h4>
                                <p class="mb-35 pb-10">Etiam mattis posuere sem, a bibendum nulla asfsdg kuyj dgfh yhjmh congue nec. Donec eget metus nisi. Suspendisse potenti. Pellentesque sed sem sodales, malesuada sapien ut, rutrum sem.</p>
                                <div class="client-2-img d-flex align-items-center fixed-bottom justify-content-md-start justify-content-center">
                                    <div class="img-div mr-30 pb-10">
                                        <div class="client-image">
                                            <img src="{{ asset('website/assets/img/testimonial/client2.jpg')}}" class=" rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="client-text-2  mb-10">
                                        <h6 class="client-name green fs-17 f-700">Jessica David</h6>
                                        <p class="mb-0 fs-13 f-500">CEO, Abc Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial area end -->
    
    <!-- contact -->
    <section>
        <div class="container pt-30 pb-30">
            <div class="row">
                <img src="{{ asset('website/assets/img/banner/HOME_PAGE2.png')}}" alt="">
            </div>
        </div>
    </section>

</section>
@endsection
