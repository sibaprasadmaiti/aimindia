@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="{{asset('assets/frontend/img/contact-banner.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-center">Contact</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact_arae_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                        <h3 class="block_text block_center">Contact with us</h3>
                        <h2 class="all-title text-center mb-4 pb-4">Get in touch<span>with us & stay updates</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="contact_left_item">
                            <div class="contact_left_icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="contact_left_text">
                                <h3>Address:</h3>
                                <p>
                                    41, Ballygaunge Terrace, <br />
                                    India - 700029 , West Bengal, Kolkata
                                </p>
                            </div>
                        </div>
                        <div class="contact_left_item">
                            <div class="contact_left_icon">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </div>
                            <div class="contact_left_text">
                                <h3>Email:</h3>
                                <a href="mailto:aimindiafoundation@gmail.com">aimindiafoundation@gmail.com</a>
                            </div>
                        </div>
                        <div class="contact_left_item">
                            <div class="contact_left_icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact_left_text">
                                <h3>Phone number:</h3>
                                <a href="tel:+9103340441298">+91 033 4044-1298</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="contact_form_Wrapper">
                            <h3>Leave us a message</h3>
                            <form action="#!" id="contact_form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your full name*" required="" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your email address*" required="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject**" required="" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Message*" required=""></textarea>
                                </div>
                                <div class="contact_submit_form">
                                    <button class="g-btn mt-2">
                                        Send message <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact_full_map">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact_map_area">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.711386792072!2d88.36523871504869!3d22.515009240755937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02712b5e87cfcb%3A0x816efd57fc53bbf0!2sAim%20Foundation!5e0!3m2!1sen!2sin!4v1661705993604!5m2!1sen!2sin"
                                height="550"
                                style="border: 0; width: 100%;"
                                style="border: 0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection