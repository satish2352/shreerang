
@extends('website.layouts.master')
@section('content')
<section>
    <section>
     
         <!-- bannar start -->
        <div class="banrimgs">
            <img src="{{ asset('website/assets/img/banner/ABOUT US.png')}}" alt="">
        </div>
        <div class="mobibanrimgs">
        <img src="{{ asset('website/assets/img/banner/mobabout.png')}}" alt="">
        </div>
        <!-- bannar end -->

    </section>


<!-- history -->
<section>
            <div class="container pt-30">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="fancy-head text-center relative z-5 mb-10 wow fadeInDown">
                            <h1>History</h1>
                        </div>
                    </div>
                </div>        
            </div>
    <div class="container">
        <div class="row">

        <div class="col-lg-5">
            <div class="row justify-content-sm-start justify-content-center justify-content-md-start">
                <h1 class="green f-700">1985</h1>
                <img src="{{ asset('website/assets/img/about/1985.png')}}" alt="">
            </div>
            <div class="row pt-45 justify-content-sm-start justify-content-center justify-content-md-start">
                <h1 class="green f-700">1987</h1>
                <img src="{{ asset('website/assets/img/about/2000.png')}}" alt="">
            </div>
        </div>
        <div class="col-lg-2">
        <ul class="experience">
                        <li>
                            <span></span>
                        </li>
                        <li>
                            <span></span> 
                        </li>
                        <li>
                            <span></span>
                        </li> 
                        <li>
                            <span></span>
                        </li>
                    </ul>
        </div>
        <div class="col-lg-5 pt-45">
        <div class="row justify-content-sm-start justify-content-center justify-content-md-start">
            <h1 class="green f-700">2000</h1>
                <img src="{{ asset('website/assets/img/about/1987.png')}}" alt="">
            </div>
            <div class="row pt-45 justify-content-sm-start justify-content-center justify-content-md-start">
                <h1 class="green f-700">2007</h1>
                <img src="{{ asset('website/assets/img/about/2007.png')}}" alt="">
            </div>
        </div>
                    
        </div>
    </div>
</section>

<!-- <section class="pt-50" data-overlay="9">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="fancy-head text-center relative z-5 mb-40 wow fadeInDown">
                            <h1>History</h1>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="container">                 
              <div class="row text-center p-1">
                    <img src="img/about/history1.png" alt="">                      
                </div>
            </div>

</section> -->
<!-- end history -->
    <!-- Director Desk -->
    <section class="pt-30 pb-40" id="direct">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="fancy-head text-center relative z-5 mb-4 wow fadeInDown">
                            <h1>Director Desk</h1>
                        </div>
                    </div>
                </div>  

                <div class="container">
                    <img src="{{ asset('website/assets/img/about/review.png')}}" alt="">
                </div>
                {{-- <div class="container-fluid text-center">
                    <div class="row sup ">
            
                        <div class="col-lg-3 sid1">
                            <img src="{{ asset('website/assets/img/about/director1.png')}}" class=" dirim" alt="">
                        </div>
                        <div class="col-lg-6 backd d-flex align-items-center">
                            <p class=" ps-lg-5  py-sm-5"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, saepe! Culpa facere
                                a aut fugit
                                perspiciatis itaque alias amet tempore autem tenetur. Mollitia accusantium magnam quasi labore
                                necessitatibus enim inventore!</p>
                        </div>
                        <div class="col-lg-3 sid2">
            
                        </div>
            
            
                    </div>
                </div> --}}
                {{-- <div class="container">
       
                    <div class="row">
                       <div class="card director relative shadow-1">
                               
                           <div class="row p-2">
                               <div class="col-lg-4 col-md-4 col-sm-4">
                                   <img src="{{ asset('website/assets/img/about/director1.png')}}" alt="">
                               </div>
                               <div class="col-lg-8 col-md-8 col-sm-8 p-5 deskk">
                                   <h5 class="white">Lorem ipsum dolor adipisicing elit. Laborum, assumenda quam placeat porro soluta quod sapiente accusamus consectetur excepturi nobis tenetur culpa veniam qui, provident cupiditate blanditiis harum neque ipsum!</h5>
                                   
                                   </div>
                                  
                                   
                               </div>
                           </div>
                       </div>
                    </div>
                        
                </div> --}}
                
            </div>
  
   
       
                </section>

    <!-- end Director desk -->
    <!-- vission mission -->

    <section class="">
        <div class="container pt-30">
            <div class="row pt-600 pb-40">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="row">
                    <div class="col-lg-5 text-center">
                        <div class="">
                            <h1 class="f-700">VISION</h1>
                        </div>
                        <img src="{{ asset('website/assets/img/about/vission.png')}}" id="vision_mision" alt="">
                    </div>
                    <div class="col-lg-6 pt-60 pb-50 vison">
                    <h5 class="clrtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, assumenda quam placeat porro soluta quod sapiente accusamus consectetur excepturi nobis tenetur culpa veniam qui, provident cupiditate blanditiis harum neque ipsum!</h5>
                    </div>
                    
                    <div class="col-lg-5 order-md-2 text-center">
                    
                        <img src="{{ asset('website/assets/img/about/mission.png')}}" id="vision_mision" alt="">
                        <div class="">
                            <h1 class="f-700">MISSION</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-30 order-md-1 misn1">
                    <h5 class="clrtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit explicabo pariatur odio. Placeat vitae temporibus suscipit harum doloremque, ipsum corrupti, quis tempore, cumque dignissimos sunt quia laborum? Ducimus, alias quidem?</h5>
                    </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>

            </div>
        </div>
    </section>
    <!-- end vision mission -->

    <!-- Team area start -->
        
        <section class="pt-5" data-overlay="9">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="fancy-head text-center relative z-5 mb-20 wow fadeInDown">
                            <h1>Team</h1>
                        </div>
                    </div>
                </div>        
            </div>
        </section>
    
       <section class="team-area pt-10 pb-30">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="each-team-3 team_shadow fix">
                        <div class="image-team-3 relative">
                            <a><img src="{{ asset('website/assets/img/team/team1b.png')}}" class="pt-3 pl-3 pr-3" alt=""></a>
                            <div class="team-detail-3 transition-5" data-overlay="8">
                                <div class="team-content z-5">
                                    <h5 class="green f-700 fs-19 relative"><a>Shubham</a></h5>
                                    <p class="designation white fs-13">Co Founder</p>
                                    {{-- <ul class="social-icons boxed-social mb-5">
                                        <li>
                                            <a><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="each-team-3 team_shadow fix">
                        <div class="image-team-3 relative">
                            <a><img src="{{ asset('website/assets/img/team/team2b.png')}}" class="pt-3 pl-3 pr-3" alt=""></a>
                            <div class="team-detail-3 transition-5" data-overlay="8">
                                <div class="team-content z-5">
                                    <h5 class="green f-700 fs-19 relative"><a>Shubham</a></h5>
                                    <p class="designation white fs-13">Finance Manager</p>
                                    {{-- <ul class="social-icons boxed-social mb-5">
                                        <li>
                                            <a><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="each-team-3 team_shadow fix">
                        <div class="image-team-3 relative">
                            <a><img src="{{ asset('website/assets/img/team/team3b.png')}}" class="pt-3 pl-3 pr-3" alt=""></a>
                            <div class="team-detail-3 transition-5" data-overlay="8">
                                <div class="team-content z-5">
                                    <h5 class="green f-700 fs-19 relative"><a>Shubham</a></h5>
                                    <p class="designation white fs-13">Web Designer</p>
                                    {{-- <ul class="social-icons boxed-social mb-5">
                                        <li>
                                            <a><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="each-team-3 team_shadow fix">
                        <div class="image-team-3 relative">
                            <a><img src="{{ asset('website/assets/img/team/team4b.png')}}" class="pt-3 pl-3 pr-3" alt=""></a>
                            <div class="team-detail-3 transition-5" data-overlay="8">
                                <div class="team-content z-5">
                                    <h5 class="green f-700 fs-19 relative"><a>Shubham</a></h5>
                                    <p class="designation white fs-13">Co Founder</p>
                                    {{-- <ul class="social-icons boxed-social mb-5">
                                        <li>
                                            <a><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="each-team-3 team_shadow fix">
                        <div class="image-team-3 relative">
                            <a><img src="{{ asset('website/assets/img/team/team5b.png')}}" class="pt-3 pl-3 pr-3" alt=""></a>
                            <div class="team-detail-3 transition-5" data-overlay="8">
                                <div class="team-content z-5">
                                    <h5 class="green f-700 fs-19 relative"><a>Shubham</a></h5>
                                    <p class="designation white fs-13">Co Founder</p>
                                    {{-- <ul class="social-icons boxed-social mb-5">
                                        <li>
                                            <a><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="each-team-3 team_shadow fix">
                        <div class="image-team-3 relative">
                            <a><img src="{{ asset('website/assets/img/team/team6b.png')}}" class="pt-3 pl-3 pr-3" alt=""></a>
                            <div class="team-detail-3 transition-5" data-overlay="8">
                                <div class="team-content z-5">
                                    <h5 class="green f-700 fs-19 relative"><a>Shubham</a></h5>
                                    <p class="designation white fs-13">Co Founder</p>
                                    {{-- <ul class="social-icons boxed-social mb-5">
                                        <li>
                                            <a><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    
            </div>
            {{-- <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-type1 center-align mt-30">
                        <ul>
                            <li>
                                <a><i class="fas fa-long-arrow-alt-left"></i></a>
                            </li>
                            <li><a>1</a></li>
                            <li><a>2</a></li>
                            <li><a>3</a></li>
                            <li>
                                <a><i class="fas fa-long-arrow-alt-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Team area end -->
</section>
@endsection
