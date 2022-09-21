@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="{{asset('assets/frontend/img/blog-banner.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-center">Join Volunteer</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li>Be Friend</li>
                            <li>Join Volunteer</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="befriend_details_arae_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="item">
                            <div class="post-cont">
                                <h5>Volunteering In Aim Foundation</h5>
                                <p>AIM FOUNDATION provides safe, affordable and meaningful volunteer programs in Kolkata, the City of Joy. We offer a vast variety of programs, cultural exchange programs, internships, gap year programs in India, where volunteers can choose to work in Kolkata, where Mother Teresa spent her lifetime serving the poor. Our choice of programs include working with Orphans, Women Empowerment Programmes, Health/HIV programs, Teaching Programme, Street Children Programmes, Internship Programmes and more. You can join our programs in India, as an individual, as a group or even choose to volunteer with your family.</p>
                                <p>However, today’s volunteering includes donating your virtual time and skills. Instead of being present to volunteer in the “real world,” many people have found their place in the world of virtual volunteering.</p>
                                <p>Aim India Foundation works in different verticals viz: education, environment, health, hygiene, relief to poor, women empowerment and awareness programmes. Explore the various volunteering options, go through the Volunteer Orientation AV as well read the <a href="#">Code of Conduct for volunteer</a></p>
                                <h3>Join Volunteer</h3>
                                <p>AIM FOUNDATION provides safe, affordable and meaningful volunteer programs in Kolkata, the City of Joy. We offer a vast variety of programs, cultural exchange programs, internships, gap year programs in India, where volunteers can choose to work in Kolkata, where Mother Teresa spent her lifetime serving the poor. Our choice of programs include working with Orphans, Women Empowerment Programmes, Health/HIV programs, Teaching Programme, Street Children Programmes, Internship Programmes and more. You can join our programs in India, as an individual, as a group or even choose to volunteer with your family.</p>
                                <p>However, today’s volunteering includes donating your virtual time and skills. Instead of being present to volunteer in the “real world,” many people have found their place in the world of virtual volunteering.</p>
                                <p>Aim India Foundation works in different verticals viz: education, environment, health, hygiene, relief to poor, women empowerment and awareness programmes. Explore the various volunteering options, go through the Volunteer Orientation AV as well read the <a href="#">Code of Conduct for volunteer</a></p>
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