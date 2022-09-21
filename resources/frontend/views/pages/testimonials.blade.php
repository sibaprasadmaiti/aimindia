@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="uploads/images/{{$banner->banner_image}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-center">{{$banner->banner_title}}</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li>Testimonials</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonials_arae_main">
            <div class="container">
                <span class="block_text block_center">OUR TESTIMONIALS</span>
                <h2 class="all-title text-center mb-4 pb-4">{!! html_entity_decode($testimonial[0]->testimonial_section_title) !!}</h2>
                <div class="row">
                    @if ($testimonial)
                    @foreach ($testimonial as $item)
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="testimonial_wrapper_boxed">
                            <div class="picture">
                                <img src="uploads/images/{{$item->testimonial_image}}" alt="img">
                            </div>
                            {!! html_entity_decode($item->testimonial_comment) !!}
                                <div class="test_author">
                                <img src="{{ asset('assets/frontend/img/quot.png')}}" alt="img">
                                <h4>{{$item->testimonial_name}}</h4>
                                <h5>{{$item->testimonial_location}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{-- <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="testimonial_wrapper_boxed">
                            <div class="picture">
                                <img src="assets/img/testimonial/test-1.png" alt="img">
                            </div>
                            <p>The whole AIF team is very inspirational and dedicated towards their work. Aim Foundation Association is doing a great job in our society in making it socially productive.</p>
                                <div class="test_author">
                                <img src="{{ asset('assets/frontend/img/quot.png')}}" alt="img">
                                <h4>Adarsh A. Saman</h4>
                                <h5>Kerala</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="testimonial_wrapper_boxed">
                            <div class="picture">
                                <img src="assets/img/testimonial/test-1.png" alt="img">
                            </div>
                            <p>AIF is a foundation in its baby age, though it is working tremendously well for child rights and social cause. I am honoured to be a part of this wonderful family.</p>
                                <div class="test_author">
                                <img src="{{ asset('assets/frontend/img/quot.png')}}" alt="img">
                                <h4>Ashmitha Raju</h4>
                                <h5>Kerala</h5>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
@endsection
