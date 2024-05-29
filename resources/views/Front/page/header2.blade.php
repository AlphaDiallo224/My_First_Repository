<header>
    <!-- Start Navigation -->
    <nav class="navbar navbar-common mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">

        <div class="container d-flex justify-content-between align-items-center">            
            

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo.png" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="{{asset('Front/assets/img/logo.png')}}" alt="Logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>
                
                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    @include('Front.component.navigation')                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="attr-right">
                <!-- Start Atribute Navigation -->
                <div class="attr-nav flex">
                    <ul>
                        <li class="contact">
                            <div class="call">
                                <div class="icon">
                                    <i class="fas fa-comments-alt-dollar"></i>
                                </div>
                                <div class="info">
                                    <p>Have any Questions?</p>
                                    <h5><a href="mailto:info@crysta.com">info@atozen.com</a></h5>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

            </div>
            <!-- Main Nav -->

        </div>  
        <!-- Overlay screen for menu -->
        <div class="overlay-screen"></div>
        <!-- End Overlay screen for menu --> 
    </nav>
    <!-- End Navigation -->
</header>