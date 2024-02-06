
@extends('website.layouts.master')
@section('content')
<section>
   <!-- Slider start -->
   <div class="img">
        <img src="{{ asset('website/assets/img/banner/contact us.png')}}" alt="">
    </div>

    <!-- Slider end -->

    <!--  -->
    <section>
        <div class="contbak pt-50 pb-100">
            <div class="container mb-40">

                <div class="relative">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3778.902662373481!2d73.87301578588553!3d18.71317551794439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c9b63758f905%3A0x9c597b5dffbfded8!2sChakan%20-%20Alandi%20Rd%2C%20Chakan%2C%20Maharashtra%20410501!5e0!3m2!1sen!2sin!4v1706764319355!5m2!1sen!2sin" width="100%" height="650" id="mapframe" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>          
                </div>

                <div class="addrescard">
                    <div class="card">
                            <h4 class="card-header card-info text-center text-white">
                                Address
                    </h4>
                            <div class="card-body text-justify py-4 px-5">
                            <ul class="text-black">
                                    <li><span class="green">Plant No 1</span> - W-127 (A),</li>
                                    <li><span class="green">Plant No 2</span> - W-118 (A) MIDC Ambad Nashik - 422010 ,</li>
                                    <li><span class="green">Plant No 3</span> - GAT NO679/2/1 , Kurli Alandi Road ,Chankan , Tal khed Dist. Pune - 410501,</li>
                                    <li><span class="green">Plant No 4</span> - GF Plot No - 913 Shreeji Engg, GIDC  , Halol , Panchamahal Gujarat - 389350</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contcatcontainer">
                    <div class="card shadow-1">
                            
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <img src="{{ asset('website/assets/img/contact/callimg1.png')}}" alt="">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 mt-4 p-5">
                                <div class="row">
                                    <div class="col-lg-4">
                                    <h4>Contact</h4>
                                    </div>
                                    <div class="col-lg-4">
                                    <a href="tel:+91 7028082176">7028082176</a>  
                                    </div>
                                    <div class="col-lg-4">
                                    <a href="tel: +91 0253 - 2383517">0253 - 2383517</a>
                                    </div>
                                             
                                </div>
                                <div class="row social-links py-3">
                                    <div class="col-lg-6 col-md-6">
                                    <h4>Follow us on</h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 social-links">
                                    <ul class="social-icons">
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                            </div>
                                </div>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
@endsection