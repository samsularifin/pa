<!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) -->
                <div class="bannercontainer">
                    <div class="banner">
                        <ul>
<!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) - SLIDE 1 [SLIDE STYLE=BOXFADE] -->
							<?php
								foreach($slider as $data){
							?>
                            <li class="slide1" data-transition="boxfade" data-slotamount="5" data-masterspeed="300">
                                <img alt="" src="<?php echo base_url();?>file/gambar/slider/<?php echo $data->NAMA_SLIDER;?>" />                                <div class="caption sfb carousel-caption" data-x="0" data-y="320" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: #1c1711; width: 436px;">
                                    <p class="small" style="color:#fff"><?php echo $data->JUDUL_SLIDER_SATU;?></p> 
									<div class="carousel-caption">
                                                <h2><a href="#">Simply the best!</a></h2>
                                                <p>Curabitur a arcu elementum tellus pellentesque sagittis a eget libero. Nam a dui nec enim pharetra bibendum.</p>
                                            </div>
                                </div>

                            </li>
							<?php
							}
							?>
							
<!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) - SLIDE 2 [SLIDE STYLE=LEFT] -->
                         <!--   <li class="slide2" data-transition="slideleft" data-slotamount="10" data-masterspeed="300">
                                <img alt="" src="<?php echo base_url();?>desainfront/img/slider02.png" />
                                <div class="caption sft carousel-caption" data-x="472" data-y="69" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none;">
                                    <p class="middle">Is your business website mobile ready?</p>

                                </div>
                                <div class="caption sfr carousel-caption" data-x="462" data-y="107" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                    <p class="big">20% of all web</p>
                                </div>
                                <div class="caption sfl carousel-caption" data-x="462" data-y="156" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                    <p class="big">traffic today is from</p>
                                </div>
                                <div class="caption sfl carousel-caption" data-x="462" data-y="205" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                    <p class="big">mobile devices</p>
                                </div>
                                <div class="caption sfb carousel-caption" data-x="474" data-y="262" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; width: 436px;">
                                    <p class="small">The mobile revolution is here. Is your business ready for it? Built using the latest web technology platform and framework; HTML5, CSS3 and Twitter Bootstrap, bizstrap allows you to create one site that renders beautifully on all devices, including computers, tablet and phones.</p>
                                </div>
                            </li>
<!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) - SLIDE 3 [SLIDE STYLE=SLIDE DOWN] -->
                          <!--  <li class="slide3" data-transition="slidedown" data-slotamount="1" data-masterspeed="300">
                                <img alt="" src="<?php echo base_url();?>desainfront/img/slider03.png" />
                                <div class="caption sft carousel-caption" data-x="43" data-y="184" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; padding-left: 0;">
                                    <p class="middle">Create beautiful pages quickly and easily...</p>
                                </div>
                                <div class="caption sfl carousel-caption" data-x="0" data-y="228" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none; padding-left: 0; width: 781px;">
                                    <p class="big">Over 30 Shortcuts and Rapid-Design Page Templates!</p>
                                </div>
                                <div class="caption sfb carousel-caption" data-x="0" data-y="281" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; padding-left: 0; width: 100%;">
                                    <p class="small">Creating beautiful and highly functional web pages doesn�t have to take hours. In fact, with over 30 pre-made page templates, bizstrap makes<br /> creating great looking web pages quick and easy.</p>
                                </div>
                            </li>
<!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) - SLIDE 4 [SLIDE STYLE=BOXFADE] -->
                         <!--   <li class="slide4" data-transition="boxfade" data-slotamount="5" data-masterspeed="300">
                            <li class="slide4" data-transition="boxfade" data-slotamount="5" data-masterspeed="300">
                                <img alt="" src="<?php echo base_url();?>desainfront/img/slider07.png" />
                                                <div class="caption sft carousel-caption" data-x="45" data-y="78" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none;">
                                                    <p class="middle">Slap the page with a Sticky Note!</p>

                                                </div>
                                                <div class="caption sfl carousel-caption" data-x="26" data-y="107" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                                    <p class="big">Got a special message</p>
                                                </div>
                                                <div class="caption sfl carousel-caption" data-x="26" data-y="160" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                                    <p class="big">you want to stand out on a</p>
                                                </div>
                                                <div class="caption sfl carousel-caption" data-x="26" data-y="214" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                                    <p class="big">particular web page?</p>
                                                </div>
                                                <div class="caption sfb carousel-caption" data-x="42" data-y="265" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; width: 436px;">
                                                    <p class="small">When you have a special message on a particular web page that you want to get a across to your visitors then slap that page with one of bizstrap's exclusive sticky notes. You'll find that website visitors simply can't resist them.</p>
                                                </div>
                                                <div class="caption sfl carousel-caption stick1" data-x="450" data-y="52" data-speed="1400" data-start="1000" data-easing="easeInExpo" style="background: none;">
                                                    <img alt="" src="<?php echo base_url();?>desainfront/img/slide_stick01.png" />
                                                </div>
                                                <div class="caption sfl carousel-caption stick2" data-x="607" data-y="52" data-speed="1400" data-start="1500" data-easing="easeInExpo" style="background: none;">
                                                    <img alt="" src="<?php echo base_url();?>desainfront/img/slide_stick02.png" />
                                                </div>
                                                <div class="caption sfl carousel-caption stick3" data-x="764" data-y="52" data-speed="1400" data-start="2000" data-easing="easeInExpo" style="background: none;">
                                                    <img alt="" src="<?php echo base_url();?>desainfront/img/slide_stick03.png" />
                                                </div>
                                                <div class="caption sfl carousel-caption stick4" data-x="450" data-y="208" data-speed="1400" data-start="2500" data-easing="easeInExpo" style="background: none;">
                                                    <img alt="" src="<?php echo base_url();?>desainfront/img/slide_stick04.png" />
                                                </div>
                                                <div class="caption sfl carousel-caption stick5" data-x="607" data-y="208" data-speed="1400" data-start="3000" data-easing="easeInExpo" style="background: none;">
                                                    <img alt="" src="<?php echo base_url();?>desainfront/img/slide_stick05.png" />
                                                </div>
                                                <div class="caption sfl carousel-caption stick6" data-x="764" data-y="208" data-speed="1400" data-start="3500" data-easing="easeInExpo" style="background: none;">
                                                    <img alt="" src="<?php echo base_url();?>desainfront/img/slide_stick06.png" />
                                                </div>
                                            </li>                            
<!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) - SLIDE 5 [SLIDE STYLE=SLOTFADE HORIZONTAL] -->
                          <!--  <li class="slide5" data-transition="slotfade-horizontal" data-masterspeed="300" data-slotamount="20">
                                <img alt="" src="<?php echo base_url();?>desainfront/img/slider04.png" />
                                <div class="caption sft carousel-caption" data-x="468" data-y="71" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; padding-left: 0;">
                                    <p class="middle">Smart, very smart indeed!</p>
                                </div>
                                <div class="caption sfr carousel-caption" data-x="454" data-y="105" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                    <p class="big">Tingkatkan Skill</p>
                                </div>
                                <div class="caption sfr carousel-caption" data-x="454" data-y="154" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                    <p class="big">Komunikasi anda</p>
                                </div>
                                <div class="caption sfr carousel-caption" data-x="454" data-y="205" data-speed="1000" data-start="1000" data-easing="easeOutBack" style="background: none;">
                                    <p class="big">di Rumah Bahasa</p>
                                </div>
                                <div class="caption sfb carousel-caption" data-x="480" data-y="268" data-speed="1000" data-start="1000" data-easing="easeInBack" style="background: none; padding-left: 0;">
                                    <p class="small">Affordable, effective and easy-to-use bizstrap is the smart choice for building and managing your business website. Smart, very smart indeed!</p>
                                </div>
                            </li> -->

                    </ul>
                        <div class="tp-bannertimer"></div>
                    </div>
                </div>