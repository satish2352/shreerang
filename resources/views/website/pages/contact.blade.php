
@extends('website.layouts.master')
@section('content')
<section>
   <!-- bannar start -->
    <div class="banrimgs">
        <img src="{{ asset('website/assets/img/banner/contact us.png')}}" alt="">
    </div>
    <div class="mobibanrimgs">
      <img src="{{ asset('website/assets/img/banner/mobcontact.png')}}" alt="">
  </div>
    <!-- bannar end -->

    <!--  -->
    <section>
        <div class="contbak">
            <div class="container mb-10 pt-50 pb-100">
                {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 p-2">
                        <div class="card text-center">
                            <div class="text-center pt-4">

                                <img src="{{ asset('website/assets/img/contact/location.png')}}" style="width: 150px;" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body text-center">
                              <h3 class="card-title f-700">Plant No 1</h3>
                              <h6 class="card-title">W-127 (A), <br>
                                MIDC, Ambad Nashik- 422010 </h6>
                              <p class="card-text card-title"> </p>
                            </div>
                            <ul class="text-center">
                              <li class="f-600">7028082176
                               </li>
                              <li class="f-600"> 0253 - 2383517</li>
                            </ul>
                            <div class="p-3 text-center card-info">
                              
                              <h4 class="white f-600"> <a href="https://maps.app.goo.gl/ThctFSNi3kxhsAV87" target="blank" class="card-link">Get Direction</a> </h4>
                              
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 p-2">
                        <div class="card text-center">
                            <div class="text-center pt-4">

                                <img src="{{ asset('website/assets/img/contact/location.png')}}" style="width: 150px;" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body text-center">
                              <h3 class="card-title f-700">Plant No 2</h3>
                              <h6 class="card-title"> W-118 (A), <br> MIDC Ambad Nashik 
                                422010</h6>
                              <p class="card-text card-title"> </p>
                            </div>
                            <ul class="text-center">
                              <li class="f-600">7028082176
                               </li>
                              <li class="f-600"> 0253 - 2383517</li>
                            </ul>
                            <div class="p-3 text-center card-info">
                              
                              <h4 class="white f-600"> <a href="https://maps.app.goo.gl/HkB2JkJixZCUWmQK6" target="blank" class="card-link">Get Direction</a> </h4>
                              
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 p-2">
                        <div class="card text-center">
                            <div class="text-center pt-4">

                                <img src="{{ asset('website/assets/img/contact/location.png')}}" style="width: 150px;" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body text-center">
                              <h3 class="card-title f-700">Plant No 3</h3>
                              <h6 class="card-title"> GAT NO-679/2/1 , Kurli Alandi Road ,Chankan , Tal khed Dist. Pun - 410501
                            </h6>
                              <p class="card-text card-title"> </p>
                            </div>
                            <ul class="text-center">
                              <li class="f-600">7028082176
                               </li>
                              <li class="f-600"> 0253 - 2383517</li>
                            </ul>
                            <div class="p-3 text-center card-info">
                              
                              <h4 class="white f-600"> <a href="" target="blank" class="card-link">Get Direction</a> </h4>
                              
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 p-2">
                        <div class="card text-center">
                            <div class="text-center pt-4">

                                <img src="{{ asset('website/assets/img/contact/location.png')}}" style="width: 150px;" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body text-center">
                              <h3 class="card-title f-700">Plant No 4</h3>
                              <h6 class="card-title"> GF PLOT NO-913 Shreeji Engg.,GIDC,Halol , Panchamahal Gujarat - 389350</h6>
                              <p class="card-text card-title"> </p>
                            </div>
                            <ul class="text-center">
                              <li class="f-600">7028082176
                               </li>
                              <li class="f-600"> 0253 - 2383517</li>
                            </ul>
                            <div class="p-3 text-center card-info">
                              
                              <h4 class="white f-600"> <a href="https://maps.app.goo.gl/8vvmafbwcG6vSJ5A9" target="blank" class="card-link">Get Direction</a> </h4>
                              
                            </div>
                          </div>
                    </div>

                </div> --}}

                <div class="relative">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3778.902662373481!2d73.87301578588553!3d18.71317551794439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c9b63758f905%3A0x9c597b5dffbfded8!2sChakan%20-%20Alandi%20Rd%2C%20Chakan%2C%20Maharashtra%20410501!5e0!3m2!1sen!2sin!4v1706764319355!5m2!1sen!2sin" width="100%" height="650" id="mapframe" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>          
                </div>

                <div class="addrescard">
                    <div class="card">
                            <h4 class="card-header card-info1 text-center text-white">
                                Address
                    </h4>
                            <div class="card-body text-justify py-4 px-5">
                            <ul class="clrtext">
                                    <li><span class="f-600">Plant No 1</span> - W-127 (A),</li>
                                    <li><span class="f-600">Plant No 2</span> - W-118 (A) MIDC Ambad Nashik - 422010 ,</li>
                                    <li><span class="f-600">Plant No 3</span> - GAT NO679/2/1 , Kurli Alandi Road ,Chankan , Tal khed Dist. Pune - 410501,</li>
                                    <li><span class="f-600">Plant No 4</span> - GF Plot No - 913 Shreeji Engg, GIDC  , Halol , Panchamahal Gujarat - 389350</li>
                                    
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
                                    <h3 class="f-700 clrtext">Contact</h3>
                                    </div>
                                    <div class="col-lg-4">
                                    <a href="tel:+91 7028082176" class="h6 clrtext">7028082176</a>  
                                    </div>
                                    <div class="col-lg-4">
                                    <a href="tel: +91 0253 - 2383517" class="h6 clrtext">0253 - 2383517</a>
                                    </div>
                                             
                                </div>
                                <div class="row social-links py-3">
                                    <div class="col-lg-6 col-md-6">
                                      <h3 class="f-700 clrtext">Follow us on</h3>
                                    
                                    </div>
                                    <div class="col-lg-6 col-md-6 social-links social-links1">
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