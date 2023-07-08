<!DOCTYPE html>
<html class="js applicationcache geolocation history postmessage svg websockets localstorage sessionstorage no-websqldatabase webworkers audio canvas canvastext webgl video multiplebgs rgba inlinesvg hashchange hsla cssgradients opacity svgclippaths smil supports fontface generatedcontent textshadow indexeddb indexeddb-deletedatabase cssanimations backgroundsize borderimage borderradius boxshadow csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth no-csscolumns-breakbefore no-csscolumns-breakafter no-csscolumns-breakinside flexbox no-cssreflections csstransforms csstransforms3d csstransitions" style="" lang="en-US">

<!-- head-->
@include('layout.head')

    <body class="oneblock loaded">

        <div id="preloader" style="display: none;">
            <div id="loading-animation"></div>
        </div>

        <div class="main-container">

            <!-- sidebar -->
            @include('layout.sidebar')
            
            <div class="function-buttons style-light">
            
                <!-- Close Block Button -->
                <a href="#home" class="function-btn close-block load-content"><i class="ion-android-close"></i></a>
                
                <!-- Back to Portfolio Block Button -->
                <a href="#sideblock" class="function-btn backtoportfolio-block load-content"><i class="ion-grid"></i></a>
                
                <!-- Back To Top Block Button -->
                <a href="#" class="function-btn backtotop-block"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                
            </div>

            <!-- Global Overlay -->
            <div class="global-overlay">
                <div class="overlay">
                    <div class="overlay-wrapper">
                        <!-- Overlay Background -->
                        <div class="overlay-inner cover-background on-mobile" style="background-image: url('demo/video/marine.jpg');"></div>
                        <div class="overlay-inner overlay-video">
                            <div class="video-wrapper">
                                <video autoplay="autoplay" muted="muted" loop="">
                                    <source src="template/work.webm" type="video/webm">
                                    <source src="template/work.mp4" type="video/mp4">
                                    <source src="template/work.ogv" type="video/ogg">
                                </video>
                            </div>
                        </div>
                        <div class="overlay-inner background-dark-5 opacity-70"></div>
                    </div>
                </div>
            </div>

            <!-- Home Block -->
            @include('sections.home')

            <!-- Side Block -->
            <div id="sideblock" class="ed-sideblock scrollbar-dark">
                <div class="sideblock-container mCustomScrollbar _mCS_2"><div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_2_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                    <div class="sideblock-content">
                    
                        <!-- About -->
                        @include('sections.about')

                        <!-- Services -->
                        @include('sections.service')

                        <!-- Portafolio -->
                        @include('sections.portafolio')

                        <!-- Contact  -->
                        @include('sections.contac')
                      

                    </div>
                </div><div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 56px; max-height: 635px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
            </div>
            
            <!-- Footer -->
            @include('layout.footer')

            <!-- Subscribe Modal -->
            @include('sections.suscriptor')


        </div>

        <!-- JS -->
        @include('layout.jquery')

    
</body></html>