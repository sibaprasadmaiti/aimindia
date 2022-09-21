@extends('layouts.app')
@section('content')
<div class="common_banner_area" data-bgimg="uploads/images/{{$banner->banner_image}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-center">{{$banner->banner_title}}</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html">About</a></li>
                            <li>Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery_arae_main">
            <div class="container">
                <span class="block_text block_center">OUR GALLERY</span>
                <h2 class="all-title text-center mb-4 pb-4">{!! html_entity_decode($gallery[0]->gallery_section_title) !!}</h2>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="gallery-list">
                            {{-- <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="#" title="SEEDLINGS DISTRIBUTION AT BEHALA, KOLKATA">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/tree-distribution.jpg')}}" alt="SEEDLINGS DISTRIBUTION AT BEHALA, KOLKATA" />
                                </a>
                            </div> --}}
                            @if ($gallery)
                            @foreach ($gallery as $item)
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="#" title="{{$item->gallery_title}}">
                                    <img class="gallery-image" src="uploads/images/{{$item->gallery_image}}" alt="{{$item->gallery_title}}" />
                                </a>
                            </div>
                            @endforeach
                    @endif
                            {{-- <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="#" title="TREE PLANTATION TREASURER">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/tree-plantation.jpg')}}" alt="TREE PLANTATION TREASURER" />
                                </a>
                            </div>
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="#" title="UMBRELLA DISTRIBUTION AT KOLKATA">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/umbrelladistribution.jpg')}}" alt="UMBRELLA DISTRIBUTION AT KOLKATA" />
                                </a>
                            </div>
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="#" title="AMPAN RELIEF DISTRIBUTION AT DEULBARI, SUNDARBAN">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/Ampan_Relief_Distribution1.jpg')}}" alt="AMPAN RELIEF DISTRIBUTION AT DEULBARI, SUNDARBAN" />
                                </a>
                            </div>
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="#" title="Press meet by Dr. Apurba Mukherjee, U.S.A. after his lecture on Breast Cancer Detection held at Jadavpur University">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/apurba_mukherjee.jpg')}}" alt="Press meet by Dr. Apurba Mukherjee, U.S.A. after his lecture on Breast Cancer Detection held at Jadavpur University" />
                                </a>
                            </div>
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="img/blanket-distribution-at-guma.jpg" title="BLANKET DISTRIBUTION AT GUMA, 24 PARGANAS (NORTH)">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/blanket-distribution-at-guma.jpg')}}" alt="BLANKET DISTRIBUTION AT GUMA, 24 PARGANAS (NORTH)" />
                                </a>
                            </div>
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="img/community_kitchen.jpg" title="POST AMPAN COMMUNITY KITCHEN AT NAGENABAD. SUNDARBANS">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/community_kitchen.jpg')}}" alt="POST AMPAN COMMUNITY KITCHEN AT NAGENABAD. SUNDARBANS" />
                                </a>
                            </div>
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit" href="img/forest-guard.jpg" title="Forest Guard">
                                    <img class="gallery-image" src="{{asset('assets/frontend/img/forest-guard.jpg')}}" alt="Forest Guard" />
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="javascript:void(0);" class="g-btn mt-3 ml-md-4">
                            Load More <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("document").ready(function() {
                fetchTitle('gallery_section_title');
            });

            function fetchTitle(id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    url: "/admin/fetch-gallery-section-title",
                    type: "POST",
                    data: {},
                    success: function(response) {
                        console.log(response);
                        if (response) {
                            $("#"+id).val(response.gallery_section_title).blur();
                        }else{
                            $("#"+id).val('').blur();
                        }
                    }
                });
            }
        </script>
@endsection
