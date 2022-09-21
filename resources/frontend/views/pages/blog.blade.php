@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="{{asset('assets/frontend/img/blog-banner.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-center">Blog</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog_arae_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                        <h3 class="block_text block_center">NEWS OF HELPING HANDS</h3>
                        <h2 class="all-title text-center mb-4 pb-4">Latest <span style="display: inline;">Blog</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="item">
                            <div class="post-img">
                                <a href="#"> <img src="{{asset('assets/frontend/img/blog1.jpg')}}" alt="" /> </a>
                            </div>
                            <div class="post-cont">
                                <div class="head-tags">
                                    <a href="#"><span class="tag">Healthcare Initiative</span></a> <i>|</i> <span class="date"><i class="fa fa-calendar-o"></i> 05 Aug 2021</span> <i>|</i> <span class="comment"><i class="fa fa-comments"></i> 1 comment</span> <i>|</i> <span class="posted"><i class="fa fa-user"></i> posted by : <a href="javascript:void(0)">AIM Foundation</a></span>
                                </div>
                                <h5>
                                    <a href="#">Healthy food keeps a man healthy</a>
                                </h5>
                                <p>Food is the basic necessity of life. Healthy food keeps a man healthy. It should be pure, nutritious, and free from any type of human health. One always works hard to fulfill his basic necessities in life. We are not sure what kind and type of food we are consuming daily. We might be consuming…</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="post-img">
                                <a href="#"> <img src="{{asset('assets/frontend/img/blog3.jpg')}}" alt="" /> </a>
                            </div>
                            <div class="post-cont">
                                <div class="head-tags">
                                    <a href="#"><span class="tag">Healthcare Initiative</span></a> <i>|</i> <span class="date"><i class="fa fa-calendar-o"></i> 05 Aug 2021</span> <i>|</i> <span class="comment"><i class="fa fa-comments"></i> 1 comment</span> <i>|</i> <span class="posted"><i class="fa fa-user"></i> posted by : <a href="javascript:void(0)">AIM Foundation</a></span>
                                </div>
                                <h5>
                                    <a href="#">A Brief History on the Beginnings of Modern Architecture</a>
                                </h5>
                                <p>
                                    Architecture potenti fringilla pretium ipsum non blandit. Vivamus eget nisi non mi iaculis iaculis imperie quiseros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                    enesta mauris suscipe eniestion aliquam, a tincidunt eros iaculis. Proin suscipit risus eu ullamcorper fauibun..
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="pagination-wrap">
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#" class="active">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="blog-sidebar">
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
                                    <h6>Archives</h6>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-right"></i> December 2022</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i> November 2022</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i> October 2022</a></li>
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