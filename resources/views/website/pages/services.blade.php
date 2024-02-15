
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
    <section class="paddiall1" >
        <div class="" data-overlay="9">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="fancy-head text-center relative z-5 mt-30 mb-40 wow fadeInDown">
                                <h1 class="clrtext fs4">Manufacturing <span class="green">Of</span></h1>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        <div class="bakimgbnr">
            <div class="container-fluid serv pt-5 pb-30">
            
                <div class="row">
              
                    <div class="col-lg-3 manuimg1 text-center">
                        <img src="{{ asset('website/assets/img/service/trolly.png')}}" id="sevimg" alt="">
                        <div class="p-3">
                            <h2 class="f-700 clrtext">Trolley</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 manuimg2 text-center">
                        <img src="{{ asset('website/assets/img/service/roller.png')}}" id="sevimg" alt="">
                        <div class="p-3">
                            <h2 class="f-700 clrtext">Rollers</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 manuimg3 text-center">
                        <img src="{{ asset('website/assets/img/service/conveyer.png')}}" id="sevimg" alt="">
                        <div class="p-3">
                            <h2 class="f-700 clrtext">Conveyers</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 manuimg4 text-center">
                        <img src="{{ asset('website/assets/img/service/metalic_pallet.png')}}" id="sevimg" alt="">
                        <div class="p-3">
                            <h2 class="f-700 clrtext">Metalic Pallet</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end imgs -->
    <!-- services start -->
    <section class="servicebnnr paddiall">
        <div class="container-fluid testmo">
            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-40 wow fadeInDown">
                        <h1 class="white">Our Services</h1>
                    </div>
                </div>
            </div> --}}
            <div class="row align-items-center mb-10 paddiall4">
                <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                    <div class="exp-cta pr-50 pr-lg-00">
                        <h2 class="white text-center f-700 mb-10">
                            <span class="f-800 fs1">01</span>
                            WOODWORKING
                            <span class="green"></span>
                        </h2>
                        <p class="white1 pfonts mb-55 mb-md-30 pr-60 f-500 pr-md-00 p-2 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. stiae exercitationem debitis enim quaerat.</p>
                        <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                    <div class="exp-cta pr-50 pr-lg-00">
                        <h2 class="white f-700 text-center mb-10">
                            <span class="f-800 fs1">02</span>
                            METALWORKING

                        </h2>
                        <p class="white1 pfonts mb-55 mb-md-30 pr-60 f-500 pr-md-00 p-2 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. s laborum at incidunt. Dolores?</p>
                        <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 z-5 text-center text-lg-left wow fadeIn">
                    <div class="exp-cta pr-50 pr-lg-00">
                        <h2 class="white text-center f-700 mb-10">
                            <span class="f-800 fs1">03</span>
                            WOODWORKING
                            <span class="green"></span>
                        </h2>
                        <p class="white1 pfonts mb-55 mb-md-30 pr-60 f-500 pr-md-00 p-2 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. stiae exercitationem debitis enim quaerat.</p>
                        <!-- <a href="contact-us.html" class="btn btn-square">Contact us<i class="fas fa-long-arrow-alt-right ml-20"></i></a> -->
                    </div>
                </div>
                
               
            </div>
       
            
        </div>
    </section>
    <!-- services end -->


    <!-- material handling  -->
    
    <section>
        {{-- <div class="bkmtrl"> --}}
             
            <div class="" data-overlay="9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="fancy-head text-center relative z-5 wow fadeInDown">
                                <h1 class="fs4">Material Handling <span class="green">Equipment For</span></h1>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="row">
                <div class="mobmaterl container-fluid text-center">

                    <img src="{{ asset('website/assets/img/banner/material.png')}}" alt="">
                </div>
                 
            <div class="container  materl maetrialback">
                <div class="row d-flex justify-content-center m-5">
                        <div class="col-md-8 col-lg-10 card shadows pdmat">
                                            <div class="row shadow-lg ">
                                                <div class="col-md-6 oneim p-3 d-flex justify-content-center">
                                                    
                                                    <div class="team-each ">
                                                    <div class="team-image">
                                                        <img src="{{ asset('website/assets/img/service/AUTOMOBILE.png')}}" alt="">
                                                        
                                                    </div>
                                                    <div class=" text-center mt-10">
                                                        <h3 class="clrtext f-700">
                                                        AUTOMOBILE
                                                        </h3>
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6 fourim p-3 d-flex justify-content-center">
                                                
                                                    <div class="team-each mb-20">
                                                    <div class="team-image">
                                                        <img src="{{ asset('website/assets/img/service/HOSPITAL.png')}}" alt="">
                                                        
                                                    </div>
                                                    <div class=" text-center mt-10">
                                                        <h3 class="clrtext f-700">
                                                        HOSPITAL
                                                        </h3>
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6 threeim p-3 d-flex justify-content-center">
                                                
                                                    <div class="team-each mb-20 mt-10">
                                                    <div class="team-image">
                                                        <img src="{{ asset('website/assets/img/service/TRAVELING.png')}}" alt="">
                                                        
                                                    </div>
                                                    <div class=" text-center mt-10">
                                                        <h3 class="clrtext f-700">
                                                        TRAVELING
                                                        </h3>
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6 twoim p-3 d-flex justify-content-center">
                                                    
                                                    <div class="team-each mt-10">
                                                    <div class="team-image">
                                                        <img src="{{ asset('website/assets/img/service/PHARMA.png')}}" alt="">
                                                        
                                                    </div>
                                                    <div class=" text-center">
                                                        <h3 class="clrtext f-700">
                                                        PHARMA <br> 
                                                            INDUSTRIES
                                                        </h3>
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                            
                                            </div>
                        </div>
                </div>
            </div>

            </div>
        {{-- </div> --}}
    </section>
    <!-- end material handling -->

    <!-- img -->
    <section>
        <div class=" pt-25">
                  <!-- bannar start -->
                  <div class="banrimgs">
                    <img src="{{ asset('website/assets/img/banner/HOME_PAGE3old.png')}}" alt="">
                </div>
                <div class="mobibanrimgs">
                <img src="{{ asset('website/assets/img/banner/HOME_PAGE3old.jpg')}}" alt="">
                </div>
            <!-- bannar end -->
        </div>
    </section>
    <!-- img -->

    <!-- cards -->


    <section class="cardbkclr">
        <div class="container-fluid testmo1 paddiall">
            <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 col-md-12 p-4">
                        <div class="card border-0 bkcl">
                        <img src="{{ asset('website/assets/img/service/caster.png')}}" class="card-img-top" alt="...">
                        <div class="card-body  text-center card-info">
                        <h1 class="white fs2 f-600"> Caster wheels </h1>
                    
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 p-4">
                        <div class="card border-0 bkcl">
                        <img src="{{ asset('website/assets/img/service/movement.png')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center  card-info">
                        <h1 class="white fs2 f-600"> Movement Trollies </h1>
                    
                        </div>
                        
                    </div>
                    </div>
                    <div class="col-lg-1"></div>
                
                    <div class="col-lg-1"></div>

                    <div class="col-lg-5 col-md-12 p-4">
                        <div class="card border-0 bkcl">
                        <img src="{{ asset('website/assets/img/service/fabrication.png')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center card-info1">
                        <h1 class="white fs2 f-600"> Challenging Fabrication <br> Works </h1>
                    
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 p-4">
                        <div class="card border-0 bkcl">
                        <img src="{{ asset('website/assets/img/service/presshop.png')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center  card-info1">
                        <h1 class="white fs2 f-600"> Press Shop <br> Works  </h1>
                    
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
 