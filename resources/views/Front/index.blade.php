<!DOCTYPE html>
<html lang="en">

<head>
    @yield('content')
    @include('Front.page.head')

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

</head>

<body>

    <!-- Preloader Start -->
    {{-- <div class="se-pre-con"></div> --}}
    <!-- Preloader Ends -->

    <!-- Header 
    ============================================= -->

   

     @include('Front.page.banner')

    @include('Front.page.about')

    @include('Front.page.header')

    @include('Front.page.contact')

    
   
    

    
   
    <!-- End Header -->
  

    @include('Front.page.experience')
    @include('Front.page.blog')


    

    <!-- Start Banner Area 
    ============================================= -->
   
    <!-- End Banner -->

    <!-- Start Services 
    ============================================= -->

   


   
 
    <!-- Start Footer 
    ============================================= -->

    @include('Front.page.footer')
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->

    @include('Front.page.js')
  

</body>
</html>