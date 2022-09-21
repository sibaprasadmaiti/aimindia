@extends('layouts.app')
@section('content')
<div class="banner px-0">
    <div id="owl-demomain" class="owl-carousel owl-theme">
        <div class="item">
            <img src="{{asset('assets/frontend/img/Awareness-Initiatives-1920-x-580.jpg')}}" />
        </div>
        <div class="item">
            <img src="{{asset('assets/frontend/img/Awareness-Initiatives-1920-x-580.jpg')}}" />
        </div>
    </div>
</div>

<section class="services" id="services">
    <div class="container">
        <div class="row m-auto col-md-12 px-0">
            <div class="col-md-4">
                <div class="service-item">
                    <img src="{{asset('assets/frontend/img/help01.png')}}" />
                    <h4>GIVE DONATION</h4>
                    <p>We rely on your generosity to run our projects Your donation is eligible for ....</p>
                    <div class="btn">Read More</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item one-s">
                    <img src="{{asset('assets/frontend/img/help02.png')}}" />
                    <h4>BECOME A VOLUNTEER</h4>
                    <p>Volunteering does not require a special degree or prior experience. It ..</p>
                    <div class="btn">Read More</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="{{asset('assets/frontend/img/help03.png')}}" />
                    <h4>SPONSOR PROJECTS</h4>
                    <p>You can sponsor or or more project either by regular or onetime payment..</p>
                    <div class="btn">Read More</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WELCOME TO ASSOCIATED -->
<div class="about-home d-block mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-md-left text-center">
                <div id="owlwelc" class="owl-carousel owl-theme px-3">
                    <div class="item">
                        <img src="{{asset('assets/frontend/img/about.png')}}" alt="about.png" />
                    </div>
                    <div class="item">
                        <img src="{{asset('assets/frontend/img/about.png')}}" alt="about.png" />
                    </div>
                    <div class="item">
                        <img src="{{asset('assets/frontend/img/about.png')}}" alt="about.png" />
                    </div>
                    <div class="item">
                        <img src="{{asset('assets/frontend/img/about.png')}}" alt="about.png" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="all-title mb-3">Welcome to associated initiative for<span>Mankind Foundation</span></h2>
                <span class="block_text">Make Donation</span>
                <p>
                    DONATION TO AIM FOUNDATION<br />
                    Associated Initiative for Mankind Foundation (AIM FOUNDATION) We provide a platform to all those who wish to support a noble cause. Here an individual can support a cause of his/her choice while making sure that
                    the organizations to which the funds are being transferred has been evaluated for transparency and credibility. Change doesn’t happen alone! Give a helping hand to those who need it!
                </p>
                <div class="d-block">
                    <a href="javascript:void(0);" class="g-btn">
                        Donate Now <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- OUR ACTIVITIES AT HELPING HANDS -->
<div class="news-area mt-5 py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <span class="block_text">Our Activities</span>
                <h2 class="all-title text-left mb-3">OUR ACTIVITIES AT <span>HELPING HANDS</span></h2>
                <p>
                    The Sabar tribe or Sabar people are one of the most marginalized ethnic groups in India. Mainly residing in Odisha and West Bengal, during the British Raj they were classified as “criminal tribes”. The affects of
                    ostracization and social stigma have severely hampered their ability to grow economically.As a result, they continue to be the poorest tribes ....
                </p>
                <div class="d-block">
                    <a href="javascript:void(0);" class="g-btn">
                        Learn more <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="news-list">
                    <li>
                        <a href="javascript:void(0);">
                            <div class="img-in">
                                <img src="{{asset('assets/frontend/img/ac1.jpg')}}" alt="" />
                            </div>
                            <div class="mr-auto">
                                <h5>AIM2FIGHTCOVID</h5>
                                <p>
                                    Doctor's Advice- Medicine Supply - SanitizationServices
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="img-in">
                                <img src="{{asset('assets/frontend/img/ac2.jpg')}}" alt="" />
                            </div>
                            <div class="mr-auto">
                                <h5>FOREST CLEANING</h5>
                                <p>
                                    Clean murti to chandrachur watchtower an aim initiative
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="img-in">
                                <img src="{{asset('assets/frontend/img/ac3.jpg')}}" alt="" />
                            </div>
                            <div class="mr-auto">
                                <h5>SAPLINGS DISTRIBUTION</h5>
                                <p>
                                    Rural Livelihood Support ProgramAIM Foundation
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="img-in">
                                <img src="{{asset('assets/frontend/img/ac4.jpg')}}" alt="" />
                            </div>
                            <div class="mr-auto">
                                <h5>SEMINARS AND SYMPOSIUMS</h5>
                                <p>
                                    Engendering Changes (Seminar Series on Contemporary Social
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- RECENT FEEDBACK AT HELPING HANDS -->
<div class="hard-drive-area mt-5 pt-5 mb-5 pb-5">
    <div class="container">
        <span class="block_text block_center">EVENTS OF HELPING HANDS</span>
        <h2 class="all-title text-center mb-4 pb-4">Recent Feedback at<span>Helping Hands</span></h2>
        <div class="row justify-content-center">
            <div id="owl-demo1" class="tips-area owl-carousel owl-theme px-3">
                <div class="item">
                    <div class="img-area">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </div>
                    <div class="inr-slider-box">
                        <div class="w-100 d-block mt-3">
                            <p>
                                It gave me immense joy to work with the team of AIF. The organisation has the passion towards the cause and ability to convert his passion to action on the ground.
                            </p>
                            <div class="testi_people">
                                <h3>ALBART KOCHI</h3>
                                <span>KERALA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="img-area">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </div>
                    <div class="inr-slider-box">
                        <div class="w-100 d-block mt-3">
                            <p>
                                The whole AIF team is very inspirational and dedicated towards their work. Aim Foundation Association is doing a great job in our society in making it socially productive.
                            </p>
                            <div class="testi_people">
                                <h3>ADARSH A. SAMAN</h3>
                                <span>ANCHAL KERALA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="img-area">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </div>
                    <div class="inr-slider-box">
                        <div class="w-100 d-block mt-3">
                            <p>
                                AIF is a foundation in its baby age, though it is working tremendously well for child rights and social cause. I am honoured to be a part of this wonderful family.
                            </p>
                            <div class="testi_people">
                                <h3>ASHMITHA RAJU</h3>
                                <span>JAYANAGAR BANGALORE</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="img-area">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </div>
                    <div class="inr-slider-box">
                        <div class="w-100 d-block mt-3">
                            <p>
                                AIF is a foundation in its baby age, though it is working tremendously well for child rights and social cause. I am honoured to be a part of this wonderful family.
                            </p>
                            <div class="testi_people">
                                <h3>ASHMITHA RAJU</h3>
                                <span>JAYANAGAR BANGALORE</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BECOME VOLUNTEER -->
<div class="we-area">
    <div class="container text-center">
        <div class="w-box">
            <span class="block_text block_center">For Good</span>
            <h2 class="all-title text-center mb-4">Become <span style="display: inline;">Volunteer</span></h2>
            <div class="row justify-content-center">
                <div class="d-block">
                    <p class="col-md-12 float-none m-auto text-center">
                        AIM FOUNDATION provides safe, affordable and meaningful volunteer programs in Kolkata, the City of Joy. We offer a vast variety of programs, cultural exchange programs, internships, gap year programs in
                        India.
                    </p>
                </div>
                <div class="d-block">
                    <a href="javascript:void(0);" class="g-btn mx-2">
                        Join Volunteer<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    </a>
                    <a href="javascript:void(0);" class="g-btn mx-2">
                        Join Intern <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-100 d-block my-5 our-box">
    <div class="container">
        <div class="row">
            <h2 class="my-3 pb-4 text-center d-block w-100">OUR TEAM</h2>
            <div id="ourone" class="tips-area owl-carousel owl-theme">
                <div class="item">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('assets/frontend/img/sd.jpg')}}" />
                        </div>
                        <h3 class="title">Sushmeli Dutta</h3>
                        <span class="post">Vice President Cultural</span>
                        <small> Board Members</small>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('assets/frontend/img/am.jpg')}}" />
                        </div>
                        <h3 class="title">Sushmeli Dutta</h3>
                        <span class="post">Vice President Cultural</span>
                        <small> Board Members</small>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('assets/frontend/img/sg.jpg')}}" />
                        </div>
                        <h3 class="title">Sushmeli Dutta</h3>
                        <span class="post">Vice President Cultural</span>
                        <small> Board Members</small>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('assets/frontend/img/croy.jpg')}}" />
                        </div>
                        <h3 class="title">Sushmeli Dutta</h3>
                        <span class="post">Vice President Cultural</span>
                        <small> Board Members</small>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('assets/frontend/img/am.jpg')}}" />
                        </div>
                        <h3 class="title">Sushmeli Dutta</h3>
                        <span class="post">Vice President Cultural</span>
                        <small> Board Members</small>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Sponsors -->
<div class="ceriti-box py-5">
    <div class="container">
        <div class="row justify-content-center pb-5 pt-5">
            <div id="owlbar" class="tips-area owl-carousel owl-theme px-3">
                <div class="item">
                    <div class="g-img">
                        <img src="{{asset('assets/frontend/img/sp1.jpg')}}" alt="1.png" />
                    </div>
                </div>
                <div class="item">
                    <div class="g-img">
                        <img src="{{asset('assets/frontend/img/sp6.png')}}" alt="1.png" />
                    </div>
                </div>
                <div class="item">
                    <div class="g-img">
                        <img src="{{asset('assets/frontend/img/sp5.png')}}" alt="1.png" />
                    </div>
                </div>
                <div class="item">
                    <div class="g-img">
                        <img src="{{asset('assets/frontend/img/sp14.jpeg')}}" alt="1.png" />
                    </div>
                </div>
                <div class="item">
                    <div class="g-img">
                        <img src="{{asset('assets/frontend/img/sp15.jpg')}}" alt="sp15.jpg" />
                    </div>
                </div>
                <div class="item">
                    <div class="g-img">
                        <img src="{{asset('assets/frontend/img/sp17.png')}}" alt="sp15.jpg" />
                    </div>
                </div>
                <div class="item">
                    <div class="g-img">
                        <img src="{{asset('assets/frontend/img/sp8.jpg')}}" alt="sp15.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- LATEST BLOG -->
<div class="upcoming we-area">
    <div class="container">
        <span class="block_text block_center">NEWS OF HELPING HANDS</span>
        <h2 class="all-title text-center">LATEST <span style="display: inline;">BLOG</span></h2>
        <div class="row justify-content-center pt-4">
            <div class="col-md-4 col-xl-3">
                <div class="blog_content">
                    <div class="on-inimg">
                        <img src="{{asset('assets/frontend/img/blog1.jpg')}}" />
                    </div>
                    <div class="dtls-on">
                        <h4>Healthy food keeps a man healthy</h4>
                        <p>
                            Food is the basic necessity of life. Healthy food keeps a man healthy. It should be pure, nutritious, and free from any type of human health. One always works hard to fulfill his basic necessities in
                            life. We are not sure what kind and type of food we are consuming daily. We might be consuming…
                        </p>
                        <a href="javascript:void(0);" class="g-btn mt-3">
                            Read More<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="blog_content">
                    <div class="on-inimg">
                        <img src="{{asset('assets/frontend/img/blog2.jpg')}}" />
                    </div>
                    <div class="dtls-on">
                        <h4>Corona Kavach – Some Useful Information</h4>
                        <p>
                            As COVID-19 cases mount unabated in India, Financial Advisers say we need a health insurance plan for our family more than ever. As mandated by insurance regulator, IRDA, several general and health
                            insurers have now come up with standard COVID specific indemnity plan, Corona Kavach, and an optional benefit based plan Corona Rakshak. Corona Kavach…
                        </p>
                        <a href="javascript:void(0);" class="g-btn mt-3">
                            Read More<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="blog_content">
                    <div class="on-inimg">
                        <img src="{{asset('assets/frontend/img/blog3.jpg')}}" />
                    </div>
                    <div class="dtls-on">
                        <h4>Plastic Pollution</h4>
                        <p>
                            Plastic is everywhere nowadays. People are using it endlessly just for their comfort. However, no one realizes how it is harming our planet. We need to become aware of the consequences so that we can stop
                            plastic pollution. Kids should be taught from their childhood to avoid using plastic. Similarly, adults must check each other on…
                        </p>
                        <a href="javascript:void(0);" class="g-btn mt-3">
                            Read More<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="blog_content">
                    <div class="on-inimg">
                        <img src="{{asset('assets/frontend/img/blog4.jpg')}}" />
                    </div>
                    <div class="dtls-on">
                        <h4>Menstrual hygiene has been a matter of serious concern in India</h4>
                        <p>
                            In 2010 an AC Nielson and Plan India report stated that only 12% out of the 355 million reproductive-age women in India used absorbent pads or other hygienic sanitary methods. The figure is abysmal,
                            compared to countries like China, where majority of women use sanitary napkins. Most of them relied on old fabric, husks, dried…
                        </p>
                        <a href="javascript:void(0);" class="g-btn mt-3">
                            Read More<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end upcoming  -->
@endsection
