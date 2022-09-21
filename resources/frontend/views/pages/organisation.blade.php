@extends('layouts.app')
@section('content')
    <div class="common_banner_area" data-bgimg="uploads/images/{{$banner->banner_image}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="text-center">{{$banner->banner_title}}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="javascript:void(0);">About</a></li>
                        <li>Organisation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="organisation_arae_main">
        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-image about-one-img">
                            <img src="uploads/images/{{$organisation->about_section_image1}}" class="shadow" alt="image" />
                            <img src="uploads/images/{{$organisation->about_section_image2}}" class="shadow" alt="image" />

                            <div class="about-video">
                                <a href="{{$organisation->about_section_video_link}}" class="video-btn popup-youtube">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-item">
                            <h3>{{$organisation->about_section_title}}</h3>
                            {!! html_entity_decode($organisation->about_section_description) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="fact-counter" data-bgimg="uploads/images/{{$organisation->fact_counter_image}}">
            <div class="container">
                <div class="row">
                    <article class="column counter-column col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="count-outer">
                                <span class="counter">{{$organisation->fact_counter1}}</span>
                            </div>
                            <h4 class="counter-title">{{$organisation->fact_counter1_title}}</h4>
                        </div>
                    </article>
                    <article class="column counter-column col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="count-outer">
                                <span class="counter">{{$organisation->fact_counter2}}</span>
                            </div>
                            <h4 class="counter-title">{{$organisation->fact_counter2_title}}</h4>
                        </div>
                    </article>
                    <article class="column counter-column col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="count-outer">
                                <span class="counter">{{$organisation->fact_counter3}}</span>
                            </div>
                            <h4 class="counter-title">{{$organisation->fact_counter3_title}}</h4>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="legal-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="legal-item">
                            <h3>{{$organisation->legal_section_title}}</h3>
                            {!! html_entity_decode($organisation->legal_section_description) !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="legal-image">
                            <img src="uploads/images/{{$organisation->legal_section_image}}" />
                            <h5>{{$organisation->legal_section_image_title}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
