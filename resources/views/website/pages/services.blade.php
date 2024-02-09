
@extends('website.layouts.master')
@section('content')
<section>

     <!-- bannar start -->
     <div class="banrimgs">
        <img src="{{ asset('website/assets/img/banner/SERVICES.png')}}" alt="">
    </div>
    <div class="mobibanrimgs">
    <img src="{{ asset('website/assets/img/banner/mobservice.png')}}" alt="">
    </div>
    <!-- bannar end -->


    <!-- imgs -->
    <section class="pt-50 pb-50" >
        <div class="" data-overlay="9">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="fancy-head text-center relative z-5 mb-40 wow fadeInDown">
                                <h1>Manufacturing  <span class="green">of</span></h1>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        <div class="bakimgbnr">
            <div class="container pt-5 pb-10">
            
                <div class="row">
              
                    <div class="col-lg-3">
                        <img src="{{ asset('website/assets/img/service/trolly.png')}}" alt="">
                    </div>
                    <div class="col-lg-3 pt-50 pb-40">
                        <img src="{{ asset('website/assets/img/service/roller.png')}}" alt="">
                    </div>
                    <div class="col-lg-3">
                        <img src="{{ asset('website/assets/img/service/conveyer.png')}}" alt="">
                    </div>
                    <div class="col-lg-3 pt-50">
                        <img src="{{ asset('website/assets/img/service/metalic_pallet.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end imgs -->
    <!-- services start -->
    <section class="servicebnnr pt-60 pb-60">
        <div class="container">
            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-40 wow fadeInDown">
                        <h1 class="white">Our Services</h1>
                    </div>
                </div>
            </div> --}}
            <div class="row align-items-center">
                <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                    <div class="exp-cta pr-50 pr-lg-00">
                        <h4 class="white f-700 mb-10">
                            <span class="fs1">01</span>
                             WOODWORKING
                            <span class="green"></span>
                        </h4>
                        <p class="white mb-55 mb-md-30 pr-60 text-center pr-md-00">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                        <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                    <div class="exp-cta pr-50 pr-lg-00">
                        <h4 class="white f-700 mb-10">
                            <span class="fs1">02</span>
                             METALWORKING
 
                        </h4>
                        <p class="white mb-55 mb-md-30 pr-60 text-center pr-md-00">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
                        <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                    <div class="exp-cta pr-50 pr-lg-00">
                        <h4 class="white f-700 mb-10">
                            <span class="fs1">03</span>
                             <span class="">WOODWORKING</span>
                        </h4>
                        <p class="white mb-55 mb-md-30 pr-60 text-center pr-md-00">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
                        <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                    </div>
                </div>
               
            </div>
            
        </div>
    </section>
    <!-- services end -->


    <!-- material handling  -->
    
    <section>
        <div class="bkmtrl">
             
            <div class="pt-50" data-overlay="9">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="fancy-head text-center relative z-5 wow fadeInDown">
                                <h1>Material Handling <span class="green">Equipment For</span></h1>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="row">
                 
    <div class="container maetrialback">
        <div class="row d-flex justify-content-center m-5">
                <div class="col-md-8 shadows p-5">
                                    <div class="row shadow-lg ">
                                        <div class="col-md-6 oneim p-2 d-flex justify-content-center">
                                            <!-- <img class="p-4" src="./img/service/AUTOMOBILE.png" alt=""> 
                                            <p><div class="title"></div></p> -->
                                            <div class="team-each ">
                                            <div class="team-image">
                                                <img src="{{ asset('website/assets/img/service/AUTOMOBILE.png')}}" alt="">
                                                
                                            </div>
                                            <div class=" text-center mt-10">
                                                <h5 class="clrtext f-700">
                                                AUTOMOBILE
                                                </h5>
                                            
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6 fourim p-2 d-flex justify-content-center">
                                            <!-- <img class="p-4"  src="./img/service/HOSPITAL.png" alt=""> -->
                                            <div class="team-each mb-20">
                                            <div class="team-image">
                                                <img src="{{ asset('website/assets/img/service/HOSPITAL.png')}}" alt="">
                                                
                                            </div>
                                            <div class=" text-center mt-10">
                                                <h5 class="clrtext f-700">
                                                HOSPITAL
                                                </h5>
                                            
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6 threeim p-2 d-flex justify-content-center">
                                            <!-- <img class="p-4"  src="./img/service/TRAVELING.png" alt=""> -->
                                            <div class="team-each mb-20 mt-10">
                                            <div class="team-image">
                                                <img src="{{ asset('website/assets/img/service/TRAVELING.png')}}" alt="">
                                                
                                            </div>
                                            <div class=" text-center mt-10">
                                                <h5 class="clrtext f-700">
                                                TRAVELING
                                                </h5>
                                            
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6 twoim p-2 d-flex justify-content-center">
                                            <!-- <img   class="p-4" src="./img/service/PHARMA.png" alt=""> -->
                                            <div class="team-each mt-10">
                                            <div class="team-image">
                                                <img src="{{ asset('website/assets/img/service/PHARMA.png')}}" alt="">
                                                
                                            </div>
                                            <div class=" text-center">
                                                <h5 class="clrtext f-700">
                                                PHARMA <br> 
                                                    INDUSTRIES
                                                </h5>
                                            
                                            </div>
                                        </div>
                                        </div>
                                       
                                    </div>
                </div>
        </div>
    </div>

            </div>
        </div>
    </section>
    <!-- end material handling -->

    <!-- img -->
    <section>
        <div class="container-fluid pb-25 pt-25">
                  <!-- bannar start -->
                  <div class="banrimgs">
                    <img src="{{ asset('website/assets/img/banner/HOME_PAGE3old.png')}}" alt="">
                </div>
                <div class="mobibanrimgs">
                <img src="{{ asset('website/assets/img/banner/mobconnect.jpg')}}" alt="">
                </div>
            <!-- bannar end -->
        </div>
    </section>
    <!-- img -->

    <!-- cards -->


    <section class="cardbkclr">
        <div class="container pt-50 pb-50">
            <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 col-md-12 p-3">
                        <div class="card">
                        <img src="{{ asset('website/assets/img/service/caster.png')}}" class="card-img-top" alt="...">
                        <div class="card-body  text-center card-info">
                        <h3 class="white f-600"> Caster wheels </h3>
                    
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 p-3">
                        <div class="card">
                        <img src="{{ asset('website/assets/img/service/fabrication.png')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center  card-info">
                        <h3 class="white f-600"> Movement Trollies </h3>
                    
                        </div>
                        
                    </div>
                    </div>
                    <div class="col-lg-1"></div>
                
                    <div class="col-lg-1"></div>

                    <div class="col-lg-5 col-md-12 p-3">
                        <div class="card">
                        <img src="{{ asset('website/assets/img/service/movement.png')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center card-info">
                        <h3 class="white f-600"> Challenging Fabrication Works </h3>
                    
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 p-3">
                        <div class="card">
                        <img src="{{ asset('website/assets/img/service/presshop.png')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center  card-info">
                        <h3 class="white f-600"> Press Shop Works  </h3>
                    
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
               
            </div>
        </div>
    </section>
    <!-- cards -->
</section>
@endsection
 