        
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>{{ $page->title }}</title>
    <meta name='keywords' content='{{ $page->keyword }}' />
    <meta name='description' content='{{ $page->description }}' />
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="We, Resources International are a well known business enterprise in the field of construction machinery products. " />
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/'.$settings->favicon) }}" />
    <!-- css -->
    <link href="{{ asset('frontend_assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend_assets/plugins/flexslider/flexslider.css') }}" rel="stylesheet" media="screen" />  
    <link href="{{ asset('frontend_assets/css/cubeportfolio.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend_assets/css/style.css') }}" rel="stylesheet" />

    <!-- Theme skin -->
    <link id="t-colors" href="{{ asset('frontend_assets/skins/yellow.css') }}" rel="stylesheet" />
    <!-- boxed bg -->
    <link id="bodybg" href="{{ asset('frontend_assets/skins/yellow.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
     <div id="wrapper">
                <!-- start header -->
        <header>
            @if ($page->slug != 'home')
               <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="topleft-info">
                                <li><i class="fa fa-phone"></i> {{ $settings->phone }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                        
                        <ul class="topright-info">
                                <li><i class="fa fa-envelope"></i>{{ $settings->email }}</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div> 
            @endif
            
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">
                        <img src="{{ asset('images/'.$settings->logo) }}" alt="logo">
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
    @foreach (Helper::getMenuRows(0) as $row)
        @php
            $menu2 = Helper::getMenuRows($row->menu_id);
            if (count($menu2)) {
                $li1Extend = " dropdown ";
                $a1Extend = 'class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"';
                $a1ExtendArrow = '<i class="fa fa-angle-down"></i>';
            }else{
                $li1Extend = $a1ExtendArrow = $a1Extend = '';
            }
            if($page->slug == $row->slug)
                $li1Extend = $li1Extend.' active ';
           echo "<li class='".$li1Extend."''>";
            echo "<a href='";
        @endphp
            @if (is_null($row->predefined))
             {{ url('pages/'.$row->slug) }}
            @else
             {{ url($row->slug) }}
            @endif

        @php
            echo"' $a1Extend > $row->name $a1ExtendArrow </a>";
                if (count($menu2)) {

                    echo "<ul class='dropdown-menu'>";
                    foreach ($menu2 as $row2) {
                          echo "<li>";
                                echo "<a href='";
                                 @endphp
                                    {{ url('pages/'.$row2->slug) }}
                                @php
                                echo "' > $row2->name </a>";
                            echo "</li>";
                    }
                    echo "</ul>";
                }
           echo "</li>";
        @endphp

    @endforeach   
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                  
        
        @yield('content')

        <footer>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <p>© {{ date('Y').' '.$settings->siteName }} - All Right Reserved</p>
                            <div class="credits">

                                Powered by:  by <a href="https://www.solutionsplayer.com/" target="_blank">Solutions Player (Pvt) Ltd.</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="social-network">
                            <li><a href="{{ $settings->facebook }}" target="_blank" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $settings->twitter }}" target="_blank" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $settings->linkedin }}" target="_blank" data-placement="top" title="" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ $settings->youtube }}" target="_blank" data-placement="top" title="" data-original-title="Insta gram"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="{{ $settings->googleplus }}" target="_blank" data-placement="top" title="" data-original-title="google plus"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    

   

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('frontend_assets/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend_assets/plugins/flexslider/jquery.flexslider-min.js') }}"></script> 
<script src="{{ asset('frontend_assets/plugins/flexslider/flexslider.config.js') }}"></script>
<script src="{{ asset('frontend_assets/js/jquery.appear.js') }}"></script>
<script src="{{ asset('frontend_assets/js/stellar.js') }}"></script>
<script src="{{ asset('frontend_assets/js/classie.js') }}"></script>
<script src="{{ asset('frontend_assets/js/uisearch.js') }}"></script>
<script src="{{ asset('frontend_assets/js/jquery.cubeportfolio.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/google-code-prettify/prettify.js') }}"></script>
<script src="{{ asset('frontend_assets/js/animate.js') }}"></script>
<script src="{{ asset('frontend_assets/js/custom.js') }}"></script>
<style>
.carousel {
    margin-top: 20px;
}
.item .thumb {
    width: 25%;
    cursor: pointer;
    float: left;
}
.item .thumb img {
    width: 100%;
    margin: 2px;
    margin-bottom:0px !important;
}
.item img {
    width: 100%;    
}

</style>
</body>
</html>