@extends('Front.index')

@section('content')
@include('Front.page.header')
<div class="banner-style-two-area text-light bg-cover overflow-hidden" style="background-image: url('{{ asset('Front/assets/img/2440x1578.png') }}');">
    @foreach ($slides as $slide)
    <img src="{{ asset('uploads/Slide/' . $slide->image) }}" width="2440" height="1578" class="responsive-image" alt="slide">
@endforeach
</div>
    {{-- <div class="banner-style-two">
        <div class="container">
            <div class="content">
                <!-- Image Slideshow -->
                <div class="slideshow">
                  
                </div>
                <!-- End of Image Slideshow -->

                <!-- Text Content -->
                <div class="row align-center">
                    <div class="col-xl-8">
                        <h2 class="wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="400ms">Digital <strong>Experience</strong></h2>
                    </div>
                    <div class="col-xl-4">
                        <div class="banner-right-info">
                            <div class="banner-list">
                                <div class="fun-fact">
                                    <div class="content">
                                        <div class="counter">
                                            <div class="timer" data-to="276" data-speed="2000">276</div>
                                            <div class="operator">K</div>
                                        </div>
                                        <span class="medium">Completed Projects</span>
                                    </div>
                                </div>
                                <p class="wow fadeInUp" data-wow-delay="500ms">
                                    Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now achiving point.
                                </p>
                                <div class="button mt-30 wow fadeInUp" data-wow-delay="900ms">
                                    <a class="btn-animation" href="#"><i class="fas fa-arrow-right"></i> <span>Our Services</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- End of Text Content -->
            </div>
        </div>
    </div> --}}



 
    <!-- End Single Item -->


<!-- End Banner -->

<div class="about-style-two-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 about-style-two">
                <div class="about-two-thumb">
                    <img src="{{asset('Front/assets/img/800x900.png')}}" alt="Image Not Found">
                    <div class="experience">
                        <h2><strong>18</strong> Years Experience</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 about-style-two pl-50 pl-md-15 pl-xs-15 mt-60 mt-xs-40">
                <div class="about-two-info">
                    <h4 class="sub-title">About our compnay</h4>
                    <h2 class="title">Providing the best service <br> In digital marketing</h2>
                    <p>
                        Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.
                    </p>
                    <div class="about-grid-info">
                        <a class="btn-round-animation" href="#">Discover More <i class="fas fa-arrow-right"></i></a>
                        <ul class="list-info-item">
                            <li>
                                <h4><a href="#">Design <i class="fas fa-angle-right"></i></a></h4>
                            </li>
                            <li>
                                <h4><a href="#">Digital Solution <i class="fas fa-angle-right"></i></a></h4>
                            </li>
                            <li>
                                <h4><a href="#">Strategy <i class="fas fa-angle-right"></i></a></h4>
                            </li>
                            <li>
                                <h4><a href="#">Branding <i class="fas fa-angle-right"></i></a></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="services-style-two-area bg-gray default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mb-30">
                <div class="service-style-two-heading bg-theme bg-cover text-light" style="background-image: url(assets/img/shape/banner-3.webp);">
                    <h5 class="sub-title">Our Services</h5>
                    <h2 class="title">Our creative & digital agency services</h2>
                    <div class="button-border-length mt-35">
                        <a href="#" class="btn-arrow-length">See All</a>
                    </div>
                </div>
            </div>
            <!-- Start Single Item -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="service-style-two">
                    <div class="icon">
                        <img src="{{asset('Front/assets/img/icon/4.png')}}" alt="Image Not Found">
                    </div>
                    <p>
                        Comparison new entertain melancholy son themselves.
                    </p>
                    <h4><a href="#">Content Marketing</a></h4>
                    <span>Marketing</span>
                    <a href="#" class="icon-btn"><i class="fas fa-arrow-right"></i></a>
                    <div class="shape">
                        <img src="{{ asset('Front/assets/img/shape/15.webp') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Start Single Item -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="service-style-two">
                    <div class="icon">
                        <img src="{{asset('Front/assets/img/icon/5.png')}}" alt="Image Not Found">
                    </div>
                    <p>
                        Comparison new entertain melancholy son themselves.
                    </p>
                    <h4><a href="#">Social Marketing</a></h4>
                    <span>Media</span>
                    <a href="#" class="icon-btn"><i class="fas fa-arrow-right"></i></a>
                    <div class="shape">
                        <img src="{{ asset('Front/assets/img/shape/15.webp') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Start Single Item -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="service-style-two">
                    <div class="icon">
                        <img src="{{asset('Front/assets/img/icon/6.png')}}" alt="Image Not Found">
                    </div>
                    <p>
                        Comparison new entertain melancholy son themselves.
                    </p>
                    <h4><a href="#">App Development</a></h4>
                    <span>Software</span>
                    <a href="#" class="icon-btn"><i class="fas fa-arrow-right"></i></a>
                    <div class="shape">
                        <img src="{{asset('Front/assets/img/shape/15.webp')}}" alt="Image Not Found">
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Start Single Item -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="service-style-two">
                    <div class="icon">
                        <img src="{{asset('Front/assets/img/icon/7.png')}}" alt="Image Not Found">
                    </div>
                    <p>
                        Comparison new entertain melancholy son themselves.
                    </p>
                    <h4><a href="#">SEO Optimization</a></h4>
                    <span>Optimized</span>
                    <a href="#" class="icon-btn"><i class="fas fa-arrow-right"></i></a>
                    <div class="shape">
                        <img src="{{asset('Front/assets/img/shape/15.webp')}}" alt="Image Not Found">
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Start Single Item -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="service-style-two">
                    <div class="icon">
                        <img src="{{asset('Front/assets/img/icon/8.png')}}" alt="Image Not Found">
                    </div>
                    <p>
                        Comparison new entertain melancholy son themselves.
                    </p>
                    <h4><a href="#">PPC Advertising</a></h4>
                    <span>Advertisement</span>
                    <a href="#" class="icon-btn"><i class="fas fa-arrow-right"></i></a>
                    <div class="shape">
                        <img src="{{asset('Front/assets/img/shape/15.webp')}}" alt="Image Not Found">
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Start Single Item -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="service-style-two">
                    <div class="icon">
                        <img src="{{asset('Front/assets/img/icon/9.png')}}" alt="Image Not Found">
                    </div>
                    <p>
                        Comparison new entertain melancholy son themselves.
                    </p>
                    <h4><a href="#">Digital Marketing</a></h4>
                    <span>Agency</span>
                    <a href="#" class="icon-btn"><i class="fas fa-arrow-right"></i></a>
                    <div class="shape">
                        <img src="{{asset('Front/assets/img/shape/15.webp')}}" alt="Image Not Found">
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
        </div>
    </div>
</div>
<!-- End Services -->

<!-- Start Testimonials 
============================================= -->
<div class="testimonail-style-one-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="testimonial-style-one-thumb">
                    <h2 class="text-large">Testimonial</h2>
                    <img src="{{asset('Front/assets/img/illustration/1.png')}}" alt="Image Not Found">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 pt-200 pt-md-50 pt-xs-40">
                <div class="testimonial-style-one-carousel swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Single item -->
                        <div class="swiper-slide">
                            <div class="testimonial-style-one">
                                
                                <div class="item">
                                    
                                    <div class="content">
                                        <p>
                                            “Pargeting consultation discover apartments. ndulgence off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now always remembering to the point.”
                                        </p>
                                    </div>
                                    <div class="provider">
                                        <div class="thumb">
                                            <img src="{{asset('Front/assets/img/100x100.png')}}" alt="Thumb">
                                        </div>
                                        <div class="info">
                                            <h4>Matthew J. Wyman</h4>
                                            <span>Senior Consultant</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single item -->
                        <!-- Single item -->
                        <div class="swiper-slide">
                            <div class="testimonial-style-one">
                                <div class="item">
                                    
                                    <div class="content">
                                        <p>
                                            “Consultation discover apartments. ndulgence off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now always remembering to the point.”
                                        </p>
                                    </div>
                                    <div class="provider">
                                        <div class="thumb">
                                            <img src="{{asset('Front/assets/img/100x100.png')}}" alt="Thumb">
                                        </div>
                                        <div class="info">
                                            <h4>Anthom Bu Spar</h4>
                                            <span>Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single item -->
                        <!-- Single item -->
                        <div class="swiper-slide">
                            <div class="testimonial-style-one">
                                <div class="item">
                                    
                                    <div class="content">
                                        <p>
                                            “Business discover apartments. ndulgence off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now always remembering to the point.”
                                        </p>
                                    </div>
                                    <div class="provider">
                                        <div class="thumb">
                                            <img src="{{asset('Front/assets/img/100x100.png')}}" alt="Thumb">
                                        </div>
                                        <div class="info">
                                            <h4>Metho k. Partho</h4>
                                            <span>Senior Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single item -->
                    </div>

                    <!-- If we need pagination -->
                    <div class="testimonial-style-one-pagination">
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonials -->

<!-- Start Why Choose Us 
============================================= -->
<div class="choose-us-style-two-area default-padding bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="choose-us-style-two">
                    <h2 class="title mb-50">Grow business with creative ideas</h2>
                    <ul class="check-list-item">
                        <li>
                            <h4>Professional Agency</h4>
                            <p>
                                Consectetur adipisci velitsed quia non numquam eius tempralabore et dolore magnam aliquam quaerat seperate.
                            </p>
                        </li>
                        <li>
                            <h4>Solutions Provider</h4>
                            <p>
                                Know more about digital direct response than virtually any digital marketing agency in the industry same as distribution.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-7 offset-xl-1 text-end">
                <div class="choose-us-style-two-thumb">
                    <div class="curve-text">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" version="1.1">
                            <path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
                            <text><textPath href="#textPath">Award winning creative digital agency</textPath></text>
                        </svg>
                    </div>
                    <h4>We have worked for you</h4>
                    <h2 class="text-path">since 1980</h2>
                    <img src="{{asset('Front/assets/img/1500x900.png')}}" alt="Image Not Found">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Why Choose Us -->

<!-- Start Team 
============================================= -->
<div class="team-style-one-area default-padding bottom-less bg-gray">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h5 class="sub-title">Team members</h5>
                    <h2 class="title">Our professional <br> expert team members</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Single Item -->
            <div class="col-xl-4 col-md-6 mb-30">
                <div class="team-style-one">
                    <div class="thumb">
                        <img src="{{asset('Front/assets/img/800x950.png')}}" alt="Image Not Found">
                        <div class="team-info">
                            
                            <div class="team-social">
                                <div class="share-link">
                                    <i class="fas fa-share-alt"></i>
                                    <ul>
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#"><i class="fas fa-comments-alt"></i></a>
                            </div>
                            <div class="content">
                                <h4><a href="#">James Baker</a></h4>
                                <span>Marketing</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Single Item -->
            <div class="col-xl-4 col-md-6 mb-30">
                <div class="team-style-one">
                    <div class="thumb">
                        <img src="{{asset('Front/assets/img/800x950.png')}}" alt="Image Not Found">
                        <div class="team-info">
                            
                            <div class="team-social">
                                <div class="share-link">
                                    <i class="fas fa-share-alt"></i>
                                    <ul>
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#"><i class="fas fa-comments-alt"></i></a>
                            </div>
                            <div class="content">
                                <h4><a href="#">Dalton Grant</a></h4>
                                <span>Project Manager</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Single Item -->
            <div class="col-xl-4 col-md-6 mb-30">
                <div class="team-style-one">
                    <div class="thumb">
                        <img src="{{asset('Front/assets/img/800x950.png')}}" alt="Image Not Found">
                        <div class="team-info">
                            
                            <div class="team-social">
                                <div class="share-link">
                                    <i class="fas fa-share-alt"></i>
                                    <ul>
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#"><i class="fas fa-comments-alt"></i></a>
                            </div>
                            <div class="content">
                                <h4><a href="#">Ryan Ricketts</a></h4>
                                <span>Director</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
        </div>
    </div>
</div>
<!-- End Team -->

<!-- Start Experience 
============================================= -->

<!-- End Experience -->

<!-- Start Brand Area 
============================================= -->
<div class="brand-area relative overflow-hidden bg-fixed" style="background-image: url(assets/img/2440x1578.png);">
    <div class="video-bg-live">
        <div class="player" data-property="{videoURL:'gOqlwlQjVis',containment:'.video-bg-live', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:3, opacity:1, quality:'default'}"></div>
    </div>
    <div class="shadow dark-hard"></div>
    <div class="brand-style-one-info text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>Thrustede by <br> <strong>180K</strong> global brands</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-style-one bg-gradient text-light">
        <div class="container-fill">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-carousel">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <img src="{{asset('Front/assets/img/brand/1.png')}}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <img src="{{asset('Front/assets/img/brand/2.png')}}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <img src="{{asset('Front/assets/img/brand/3.png')}}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <img src="{{asset('Front/assets/img/brand/4.png')}}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <img src="{{asset('Front/assets/img/brand/5.png')}}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradn Area -->

<!-- Start Contact Us 
============================================= -->
@endsection