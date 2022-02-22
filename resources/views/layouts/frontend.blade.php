<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>Tiresstudio - We Takes Care</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.ico" type="image/x-icon')}}">
    <link rel="apple-touch-icon" href="{{asset('frontend/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('frontend/images/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontend/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend/images/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontend/images/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('frontend/images/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('frontend/images/apple-touch-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('frontend/images/apple-touch-icon-152x152.png')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/revolution/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/revolution/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/revolution/navigation.css')}}">

    <!-- BOOTSTRAP STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">
    <!-- RESPONSIVE STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
    <!-- COLORS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/colors.css')}}">
    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="{{Route::currentRouteName()=='frontend.pages.cart' ? 'cart' : '' }}">

    <div id="wrapper">
        @include('frontend.includes.header')
        @yield('content')
        @include('frontend.includes.footer')
    </div><!-- end wrapper -->

    <!-- ******************************************
    /END SITE
    ********************************************** -->

    <!-- ******************************************
    DEFAULT JAVASCRIPT FILES
    ********************************************** -->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('frontend/js/retina.js')}}"></script>
    <script src="{{asset('frontend/js/animate.js')}}"></script>
    <script src="{{asset('frontend/js/device.js')}}"></script>
    <script src="{{asset('frontend/js/parallax.js')}}"></script>
    <script src="{{asset('frontend/js/fitvid.js')}}"></script>
    <script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    <!-- revolution -->
    <script src="{{asset('frontend/revolution/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('frontend/revolution/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/revolution/revolution.extension.slideanims.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('frontend/revolution/revolution.extension.layeranimation.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('frontend/revolution/revolution.extension.navigation.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('frontend/revolution/revolution.extension.kenburn.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('frontend/revolution/revolution.extension.actions.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('frontend/revolution/revolution.extension.parallax.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('frontend/revolution/revolution.extension.migration.min.js')}}">
    </script>
    <script type="text/javascript">
        /* ==============================================
    REV SLIDER -->
    =============================================== */
        var tpj=jQuery;
        var revapi4;
        tpj(document).ready(function() {
            if (tpj("#main_slider").revolution==undefined) {
                revslider_showDoubleJqueryError("#main_slider");
            }
            else {
                revapi4=tpj("#main_slider").show().revolution( {
                    sliderType: "standard", sliderLayout: "auto", loops: false, delay: 7500, navigation: {
                        keyboardNavigation: "off", keyboard_direction: "horizontal", mouseScrollNavigation: "off", onHoverStop: "on", touch: {
                            touchenabled: "on", swipe_threshold: 75, swipe_min_touches: 1, swipe_direction: "horizontal", drag_block_vertical: false
                        }
                        , arrows: {
                            style: "hephaistos", enable: false, hide_onmobile: false, hide_onleave: false, tmp: '<div class="arrow-holder"> </div>', left: {
                                h_align: "left", v_align: "center", h_offset: 28, v_offset: 32
                            }
                            , right: {
                                h_align: "right", v_align: "center", h_offset: 43, v_offset: 32
                            }
                        }
                        ,
                    }
                    , responsiveLevels: [2220, 1183, 975, 751], gridwidth: [1170, 970, 770, 480], gridheight: [700, 700, 700, 500], lazyType: "none", parallax: {
                        type: "mouse", origo: "slidercenter", speed: 2000, levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    }
                    , shadow: 0, spinner: "off", stopLoop: "off", stopAfterLoops: -1, stopAtSlide: -1, shuffle: "off", autoHeight: "off", hideThumbsOnMobile: "off", hideSliderAtLimit: 0, hideCaptionAtLimit: 0, hideAllCaptionAtLilmit: 0, debugMode: false, fallbacks: {
                        simplifyAll: "off", nextSlideOnWindowFocus: "off", disableFocusListener: false,
                    }
                }
                );
            }
        }
    );
    /*ready*/
    </script>

    @yield('scripts')

</body>

</html>
