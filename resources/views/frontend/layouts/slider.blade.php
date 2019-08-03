    <!-- slider -->
    <div class="container-fluid rev-slider-content">
        <div class="row">
                <div class="tp-banner-container margin-bottom-50px">
                    <div class="slider_two" >
                        <ul>
                            
                            @foreach($slides as $slide)
                            <!-- slide one -->
                            <li data-transition="zoomin" data-slotamount="3">

                                <img src="{{ $slide->image_url }}" alt="slidebg3"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                                
                                <!--

                                <div 
                                class="caption slider-5-heading sft" 
                                style="z-index: 3;color:#1a1a1a;font-family: 'Playfair Display Regular';font-size:20px;text-transform:uppercase;letter-spacing:0.5em;line-height:20px;" 
                                data-x="left" 
                                data-y="center" 
                                data-voffset="-60" 
                                data-speed="700" 
                                data-start="1700">the hottest outfits for men</div>

                                <div 
                                class="caption sft caption-two"  
                                style="z-index: 4;color:#1a1a1a;font-family: 'Montserrat Semi Bold';font-size:72px;text-transform:uppercase;letter-spacing:0.1em;" 
                                data-x="left" 
                                data-y="center" 
                                data-speed="500" 
                                data-start="1900">GET IN SHAPE</div>
                                
                                <div 
                                class="caption slider-4-content sft"  
                                style="z-index: 4;color:#5f5f5f;font-size:12px;font-style:italic;line-height:32px;" 
                                data-x="left" 
                                data-y="center" 
                                data-voffset="80" 
                                data-speed="500" 
                                data-start="1900">Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor  <br> sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</div>

                                <div class="caption slider-5-btn sfl" 
                                   style="z-index: 5" 
                                   data-x="left" 
                                   data-y="center" 
                                   data-voffset="170" 
                                   data-speed="300" 
                                   data-start="2300">
                                    <a href="#" style="width:250px;margin-left:0" class="trendify-btn black-bordered"><span class="elg-sld-icon arrow_right"></span> View Collections</a>
                                </div>
                                
                                -->

                            </li>
                            
                            @endforeach

                        </ul>
                    </div>
                </div>
        </div>
    </div>
	<!-- / slider -->