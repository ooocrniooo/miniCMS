@extends('master')

@section('content')

<body class="w1170 headerstyle1">

<!-- Marine Content Wrapper -->
<div id="marine-content-wrapper">
    @include('template/shuttletours/partial/header')
    <!-- Marine Content Inner -->
    <div id="marine-content-inner">
        <!-- Main Content -->
        <section id="main-content">
            <section id="slider">
                <div class="container">
                    @include('template/shuttletours/partial_index/bigslider')
                </div>
            </section>
            <!-- Container -->
            <div class="container">
                <section class="sc-call-to-action full-width-bg light-gray-bg small-padding marine-main-call-action">
                @include('template/shuttletours/partial_index/bigslidestripe')
                </section>

                <div class="row">
                    <section class="col-lg-12 col-md-12 col-sm-12 small-padding">

                        @include('template/shuttletours/partial_index/servicesstripe')

                        <section class="sc-call-to-action full-width-bg light-gray-bg small-padding marine-main-call-action">
                            @include('template/shuttletours/partial_index/bigtitlestripe')
                        </section>
                        {{--<div class="clearfix clearfix-height40">--}}
                        {{--</div>--}}

{{--                        @include('template/shuttletours/partial_index/threecontentrow')--}}
                        @include('template/shuttletours/partial_index/picturewithinfo')
                        <section class="sc-call-to-action full-width-bg light-gray-bg small-padding marine-main-call-action">
                            @include('template/shuttletours/partial_index/bigtitlestripe2')
                        </section>
                        @include('template/shuttletours/partial_index/ourservice')


                        <div class="clearfix clearfix-height30">
                        </div>
                        @include('template/shuttletours/partial_index/getintouch')
                    </section>
                </div>
            </div>
            <!-- /Container -->
        </section>
        <!-- /Main Content -->
    </div>
    <!-- /Marine Conten Inner -->
    @include('template/shuttletours/partial/footer')
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.tp-banner').show().revolution(
                {
                    dottedOverlay:"none",
                    delay:16000,
                    startwidth:1170,
                    startheight:700,
                    hideThumbs:200,
                    thumbWidth:100,
                    thumbHeight:50,
                    thumbAmount:5,
                    navigationType:"bullet",
                    navigationArrows:"solo",
                    navigationStyle:"preview2",
                    touchenabled:"on",
                    onHoverStop:"on",
                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,
                    parallax:"mouse",
                    parallaxBgFreeze:"on",
                    parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
                    keyboardNavigation:"off",
                    navigationHAlign:"center",
                    navigationVAlign:"bottom",
                    navigationHOffset:0,
                    navigationVOffset:20,
                    soloArrowLeftHalign:"left",
                    soloArrowLeftValign:"center",
                    soloArrowLeftHOffset:20,
                    soloArrowLeftVOffset:0,
                    soloArrowRightHalign:"right",
                    soloArrowRightValign:"center",
                    soloArrowRightHOffset:20,
                    soloArrowRightVOffset:0,
                    shadow:0,
                    fullWidth:"on",
                    fullScreen:"off",
                    spinner:"spinner4",
                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,
                    shuffle:"off",
                    autoHeight:"off",
                    forceFullWidth:"off",
                    hideThumbsOnMobile:"off",
                    hideNavDelayOnMobile:1500,
                    hideBulletsOnMobile:"off",
                    hideArrowsOnMobile:"off",
                    hideThumbsUnderResolution:0,
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    startWithSlide:0,
                    videoJsPath:"rs-plugin/videojs/",
                    fullScreenOffsetContainer: ""
                });
    });	//ready
</script>
</body>
</html>

@endsection