
@extends('website.layouts.master')
@section('content')
<section>
   <!-- Slider start -->
   <div class="img">
        <img src="{{ asset('website/assets/img/banner/SERVICES.png')}}" alt="">
    </div>

    <!-- Slider end -->


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
            <div class="container pt-5 pb-50">
            
                <div class="row">
              
                    <div class="col-lg-3">
                        <img src="{{ asset('website/assets/img/service/trolly.png')}}" alt="">
                    </div>
                    <div class="col-lg-3 pt-80">
                        <img src="{{ asset('website/assets/img/service/roller.png')}}" alt="">
                    </div>
                    <div class="col-lg-3">
                        <img src="{{ asset('website/assets/img/service/conveyer.png')}}" alt="">
                    </div>
                    <div class="col-lg-3 pt-80">
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
                            Woodworking <span class=""></span>
                        </h2>
                        <p class="white mb-55 mb-md-30 pr-60 pr-md-00">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
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
                                                <h5>
                                                <a  class="">AUTOMOBILE</a>
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
                                                <h5>
                                                <a class="">HOSPITAL</a>
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
                                                <h5>
                                                <a class="">TRAVELING</a>
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
                                                <h5>
                                                <a class="">PHARMA <br> 
                                                    INDUSTRIES</a>
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
        <div class="container-fluid pb-10 pt-50">
            <div class="row">
                <img src="{{ asset('website/assets/img/products/prodbannr.png')}}" alt="">
            </div>
        </div>
    </section>
    <!-- img -->

    <!-- cards -->


    <section class="cardbkclr">
        <div class="container pt-50 pb-50">
            <div class="row">
                <div class="col-lg-6 col-md-12 p-3">
                    <div class="card">
                    <img src="{{ asset('website/assets/img/service/caster.png')}}" class="card-img-top" alt="...">
                    <div class="card-body  text-center card-info">
                <h3 class="white f-600"> Caster wheels </h3>
                
                </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-3">
                    <div class="card">
                    <img src="{{ asset('website/assets/img/service/fabrication.png')}}" class="card-img-top" alt="...">
                    <div class="card-body text-center  card-info">
                <h3 class="white f-600"> Movement Trollies </h3>
                
                </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-3">
                    <div class="card">
                    <img src="{{ asset('website/assets/img/service/movement.png')}}" class="card-img-top" alt="...">
                    <div class="card-body text-center card-info">
                <h3 class="white f-600"> Challenging Fabrication Works </h3>
                
                </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-3">
                    <div class="card">
                <img src="{{ asset('website/assets/img/service/presshop.png')}}" class="card-img-top" alt="...">
                <div class="card-body text-center  card-info">
                <h3 class="white f-600"> Press Shop Works  </h3>
                
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cards -->
</section>
@endsection
 