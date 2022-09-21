@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="{{asset('assets/frontend/img/blog-banner.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-center">Environment Initiative</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li>Our Works</li>
                            <li>Environment Initiative</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="works_details_arae_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="item">
                            <div class="post-cont">
                                <h5>Environment Initiative</h5>
                                <p>Aim Foundation works year-round to solve climate change, to end plastic pollution, to protect endangered species, to maintain bio-diversity and to broaden, educate, and activate the environmental movement.</p>
                                <h5>We Believe in Climate Justice</h5>
                                <p>Climate change isn’t a distant, abstract problem — it’s here now. People all over the world are feeling the impacts, from island nations that are going underwater, to indigenous land being exploited for fossil fuel extraction. The fight against climate change is a fight for justice.</p>
                                <p>Green India Initiative Programme of Aim Foundation Association is designed to “develop without destruction”.</p>
                                <h3>We thrive for Plastic-free world</h3>
                                <p>Have you heard of the giant islands of plastic forming in our oceans? Did you know that plastic kills thousands of marine animals every year? Are you aware of the fact that plastic can contaminate the food we eat and the water we drink? All these are facts and are just the tip of the iceberg when it comes to plastic pollution. As a society, we have come to rely heavily on plastic for everything that we do and use. From our car and home to our food and personal hygiene, we use plastic all the time, and this is causing the planet to suffer.</p>
                                <h3>Youth Ambassador Program</h3>
                                <p>Every young person should be inspired to make a difference in their own way. By completing a series of tasks ranging from calling out sidewalk litter on social media to writing letters to government officials to composing original pieces of music, students can shape their own participation while earning rewards for accomplishing their goals. The program’s structure allows students to move up in rank, potentially becoming Aim Foundation Youth Advisor.</p>
                                <h3>Workshops & Seminars</h3>
                                <ul>
                                    <li>Proin auctor iaculis tortor, a tristique mi aliquam ut.</li>
                                    <li>Proin auctor iaculis tortor, a tristique mi aliquam ut.</li>
                                    <li>Proin auctor iaculis tortor, a tristique mi aliquam ut.</li>
                                    <li>Proin auctor iaculis tortor, a tristique mi aliquam ut.</li>
                                    <li>Proin auctor iaculis tortor, a tristique mi aliquam ut.</li>
                                    <li>Proin auctor iaculis tortor, a tristique mi aliquam ut.</li>
                                    <li>Proin auctor iaculis tortor, a tristique mi aliquam ut.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="sidebar">
                            <div class="widget search">
                                <form>
                                    <input type="text" name="search" placeholder="Type here ..." />
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Recent Posts</h6>
                                </div>
                                <ul class="recent">
                                    <li>
                                        <div class="thum"><img src="{{asset('assets/frontend/img/blog1.jpg')}}" alt="" /></div>
                                        <a href="#">Healthy food keeps a man healthy</a>
                                    </li>
                                    <li>
                                        <div class="thum"><img src="{{asset('assets/frontend/img/blog2.jpg')}}" alt="" /></div>
                                        <a href="#">Corona Kavach – Some Useful Information</a>
                                    </li>
                                    <li>
                                        <div class="thum"><img src="{{asset('assets/frontend/img/blog3.jpg')}}" alt="" /></div>
                                        <a href="#">Plastic Pollution</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Our Activies</h6>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-right"></i> Plantation in different districts of West Bengal</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i> Sapling Distribution</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i> Bird Nest Fixing and Distribution</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Categories</h6>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-angle-right"></i>Education Initiative</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-angle-right"></i>Environment Initiative</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-angle-right"></i>Healthcare Initiative</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Tags</h6>
                                </div>
                                <ul class="tags">
                                    <li><a href="#">Women Empowerment</a></li>
                                    <li><a href="#">Relief to the poor</a></li>
                                    <li><a href="#">Swachh Bharat</a></li>
                                    <li><a href="#">Awareness Programmes</a></li>
                                    <li><a href="#">Skill Development Trainings</a></li>
                                    <li><a href="#">Design</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection