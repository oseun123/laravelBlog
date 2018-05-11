
<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <div class="topborder"></div>
        <!--Logo-Header-->
       {{--  <div class="logoheader logo-top">
            <div class="logo">
                <a href="index.html"><img src="{{ asset ('user/images/logo.png')}}"  alt="image" /></a>
            </div>
        </div> --}}
        <!--Logo-Header end-->

        <!-- Main Header -->
        <header class="site-header header-second">

            <div class="header-main">
                <div class="container">
                    <div class="nav-outer clearfix">

                        <!--social-links-->
                        <div class="logo pull-left my">
                        <a href="{{ route('home') }}" class="img-responsive"><img src="{{ asset ('user/images/logo-small.png')}}" alt="Transpo" title="Transpo"></a>
                    </div>

                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                  
                               
                                  
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li class="dropdown"><a href="#">Categories</a>
                                        <ul>
                                            @foreach($categorys as $category)
                                            <li><a href="{{ route('category',$category->slug) }}">{{$category->name}}</a></li>
                                           @endforeach
                                           
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <!--Searchbox-->
                        <div class="srchbox1">
                            <ul class="menusearch">
                                <li>
                                    <div class="bz_search_bar " >
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                    <div  class="bz_search_box">
                                        <form   action="{{ route('home') }}" method="get" >
                                            <input placeholder="Search here" type="text" name="s" >
                                             <button type="submit" ><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!--Header-Main end-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="{{ route('home') }}" class="img-responsive"><img src="{{asset ('user/images/logo-small.png')}}" alt="Logo" title="Logo"></a>
                    </div>

                    <!--Right Col-->
                    <div class="right-col ">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                               
                                       <ul class="navigation clearfix center-block" style="padding-left: 20px"  >
                                       <li><a href="{{ route('home') }}">Home</a></li>
                                    <li class="dropdown"><a href="#">Categories</a>
                                        <ul>
                                            @foreach($categorys as $category)
                                            <li><a href="{{ route('category',$category->slug) }}">{{$category->name}}</a></li>
                                           @endforeach
                                           
                                        </ul>
                                    </li>
                                   
                      
                                    
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <!--Searchbox-->
                         <div class="srchbox1">
                            <ul class="menusearch">
                                <li>
                                    <div class="bz_search_bar " >
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                    <div  class="bz_search_box">
                                        <form   action="{{ route('home') }}" method="get" >
                                            <input placeholder="Search here" type="text" name="s" >
                                             <button type="submit" ><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!--social-links-->
                   {{--      <ul class="social-links">
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->

        </header>
        <!-- Main Header end -->