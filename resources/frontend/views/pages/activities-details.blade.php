@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="{{asset('assets/frontend/img/blog-banner.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-center">Plantation in different districts of West Bengal</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.html">Home</a></li>
                             <li><a href="index.html">Activities</a></li>
                            <li>Plantation in different districts of West Bengal</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="activities_details_arae_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="item">
                            <div class="post-img">
                                <a href="#"> <img src="{{asset('assets/frontend/img/tree-plantation.jpg')}}" alt="" /> </a>
                            </div>
                            <div class="post-cont">
                                <div class="head-tags">
                                    <a href="#"><span class="date"><i class="fa fa-calendar-o"></i> 05 Aug 2021</span> <i>|</i> <span class="posted"><i class="fa fa-user"></i> posted by : <a href="javascript:void(0)">AIM Foundation</a></span>
                                </div>
                                <h5>Plantation in different districts of West Bengal</h5>
                                <p>Tree Plantation in different districts. Donate to help us to continue this project.</p>
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