@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="{{asset('assets/frontend/img/team-banner.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="text-center">Activities</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index.html">About</a></li>
                    <li>Activities</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="activities_arae_main">
    <div class="container">
        <span class="block_text block_center">OUR ACTIVITIES</span>
        <h2 class="all-title text-center mb-4 pb-4">OUR ACTIVITIES AT<span>HELPING HANDS</span></h2>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="activities_wrapper">
                    <div class="activities_img">
                        <a href="#"><img src="{{asset('assets/frontend/img/tree-plantation.jpg')}}" alt="img" /></a>
                        <a class="date-absolute">
                            <time class="dateyear"> <span class="date">18 May,</span> <span class="year">2022</span> </time>
                        </a>
                    </div>
                    <div class="activities_text">
                        <div class="activities_heading">
                            <h3><a href="#">Plantation in different districts of West Bengal</a></h3>
                            <p>Tree Plantation in different districts. Donate to help us to continue this project ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="activities_wrapper">
                    <div class="activities_img">
                        <a href="#"><img src="{{asset('assets/frontend/img/tree-plantation.jpg')}}" alt="img" /></a>
                        <a class="date-absolute" href="blog-right.html" rel="bookmark">
                            <time class="dateyear"> <span class="date">18 May,</span> <span class="year">2022</span> </time>
                        </a>
                    </div>
                    <div class="activities_text">
                        <div class="activities_heading">
                            <h3><a href="#">Plantation in different districts of West Bengal</a></h3>
                            <p>Tree Plantation in different districts. Donate to help us to continue this project ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="activities_wrapper">
                    <div class="activities_img">
                        <a href="#"><img src="{{asset('assets/frontend/img/tree-plantation.jpg')}}" alt="img" /></a>
                        <a class="date-absolute" href="blog-right.html" rel="bookmark">
                            <time class="dateyear"> <span class="date">18 May,</span> <span class="year">2022</span> </time>
                        </a>
                    </div>
                    <div class="activities_text">
                        <div class="activities_heading">
                            <h3><a href="#">Plantation in different districts of West Bengal</a></h3>
                            <p>Tree Plantation in different districts. Donate to help us to continue this project ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
