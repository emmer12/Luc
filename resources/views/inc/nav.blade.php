<div  style="width: 100%;  background:#111; color: #fff; text-align: end;padding: 2px 4px 2px 4px; font-size: 10px">
    <div class="container"><strong>Contact Support:</strong> +234 703 66 2228 | fadolaassan@yahoo.com</div>
</div>
<!--
   <div id="preloader"></div>-->
<!--==========================
   Top Bar
   ============================-->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:epluc@irs.en.gov.ng">fadolaassan@yahoo.com</a>
            <i class="fa fa-phone"></i> +234 703 66 2228
        </div>
        <div class="social-links float-right">
            <!--<a href="forms.html">Forms</a>-->
            <a href="/faq">FAQ</a>
           
          
              @if (Auth::guard()->user() || Auth::guard('residential')->user() || Auth::guard('commercial')->user() )
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form-a').submit();">
                    Logout 
                
                </a>
                <form id="logout-form-a" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form> 

                <a href="{{route('dasdboard.redirect')}}">Dashboard </a>
                @else
                <a href="{{route("admin.login.view")}}">Admin Login</a>
                
                @endif
                {{-- @guest
                  <a href="{{route("admin.login.view")}}">Admin Login</a>
                    @endguest
                    @auth
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form-a').submit();">
                    Logout 
            
                    </a>
                    <a href="{{route('dasdboard.redirect')}}">Dashboard </a>
                    <form id="logout-form-a" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form> 
                @endauth --}}
                
                <a href="https://twitter.com/" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/" target="_blank" class="instagram"><i
                    class="fa fa-instagram"></i></a>
        </div>
    </div>
</section>
<!--==========================
   Header
   ============================-->
<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <h4 style="font-weight:700; color:green;font-size:30px"> <a href="/">LUC</a> </h4>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class=""><a href="/"><i class="fa fa-home"></i></a></li>
            <li class="menu-active hidden-xs"><a href="{{route("map.view")}}">Download Property Update Form</a></li>
                <li class="menu-active d-md-none d-sm-none d-lg-none"><a href="index.html">Property Update Form</a></li>
                <!--<li><a href="#about">About</a></li>
                   <li><a href="start.html">Bills & Receipts</a></li>-->
                <li><a href="{{route('guidelines.view')}}">Help</a></li>
                <!--Mobile ONLY NAV-->
                <li class="d-md-none d-sm-none d-lg-none"><a href="faq.html">FAQ</a></li>
                <li><a href="{{route('contact.view')}}">Contact</a></li>
                <li class="d-md-none d-sm-none d-lg-none"><a href="admin/login.html">Admin
                    Login</a></li>
                <!--
                   <li class="menu-has-children"><a href="#">Drop Down</a>
                     <ul>
                       <li><a href="#">Drop Down 1</a></li>
                       <li><a href="#">Drop Down 3</a></li>
                       <li><a href="#">Drop Down 4</a></li>
                       <li><a href="#">Drop Down 5</a></li>
                     </ul>
                   </li>-->
                <li class="d-xs-none"><a class="btn btn-success apply-button apply-button-mobile"
                                         href="/properties">Request
                    for Your Property ID</a></li>
                <!--
                   <li class="d-md-none d-sm-none d-lg-none"><a href="get-pid.html">Apply for Property ID</a></li>-->
            </ul>
        </nav>
        <!-- #                          
            nav-menu-container -->
    </div>
</header>
<!-- #header -->
