@extends('frontend.layout.master')


@section('content')

 {{-- Service modals start --}}

 @if ($services)
    @foreach ($services as $item)
    <div class="modal fade" id="service_modal_{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="service_details_modal">
                    <button type="button" class="btn-close service_modal_close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="aside">
                        <h3>Choose Your Package</h3>
                        <p>{{ $item->title }}</p>
                        @foreach ($item->packages as $package)
                            @if ($package->status == 1)  
                            <div class="package">
                                <div class="icon">
                                    {{-- <i class="fas fa-rocket"></i> --}}
                                    {!! $package->icon !!}
                                </div>
                                <div class="info">
                                    <h4 class="name">{{ $package->name }}</h4>
                                    {{-- <p>Facebook Business page create & setup. Fb on-page SEO and off-page SEO.Facebook Business page create & setup. Fb on-page SEO and off-page SEO.</p> --}}
                                    <p>{{ $package->description }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="content">
                        <ul class="desc_list"> 
                        @foreach ($item->feature_list as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                        </ul>
                        <ul class="list-group mt-4">
                            @foreach ($item->prices as $price)
                                <li class="list-group-item">{{ $price }}</li>
                            @endforeach
                        </ul>
                        <br>
                        <h4 class="text-center">To get service Plese contact with us</h4>
                        <br>
                        <ul class="social_link_list center">
                            <li>
                                <a href="#" class="social_btn facebook"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="social_btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            <li>
                                <a href="#" class="social_btn skype"><i class="fab fa-skype"></i></a>
                            </li>
                            <li>
                                <a href="#" class="social_btn gmail"><i class="far fa-envelope"></i></a>
                            </li>
                            <li>
                                <a href="#" class="social_btn"><i class="fas fa-phone"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
 <div class="modal fade" id="service_modal_1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="service_details_modal">
                <button type="button" class="btn-close service_modal_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="aside">
                    <h3>Choose Your Package</h3>
                    <p>Facebook Marketing</p>
                    
                    <div class="package">
                        <div class="icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="info">
                            <h4 class="name">Boost</h4>
                            <p>Facebook Business page create & setup. Fb on-page SEO and off-page SEO.Facebook Business page create & setup. Fb on-page SEO and off-page SEO.</p>
                        </div>
                    </div>
                    <div class="package">
                        <div class="icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="info">
                            <h4 class="name">Promote Page</h4>
                            <p>Facebook Business page create & setup. Fb on-page SEO and off-page SEO.Facebook Business page create & setup. Fb on-page SEO and off-page SEO.</p>
                        </div>
                    </div>
                    <div class="package">
                        <div class="icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="info">
                            <h4 class="name">Brand Awareness</h4>
                            <p>Facebook Business page create & setup. Fb on-page SEO and off-page SEO.Facebook Business page create & setup. Fb on-page SEO and off-page SEO.</p>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <ul class="desc_list">
                        <li>Facebook business page create and setup</li>
                        <li>FB on-page SEO and off-page SEO</li>
                        <li>Personalize, Bio-Setup and Design your business page as needed.</li>
                        <li>Create unique content, Increase engagement, loyal customers.</li>
                        <li>Schedule post at the best time to reach a bigger audience.</li>
                        <li>Keyword research & using best hash tags</li>
                        <li>Make Attractive product design</li>
                        <li>Write effective product description</li>
                    </ul>
                    <ul class="list-group mt-4">
                        <li class="list-group-item list-group-item-secondary">Package Amount</li>
                        <li class="list-group-item">a) Basic Promotion Package Start with 10$-50$ and Dolor Rate Price-112TK</li>
                        <li class="list-group-item">b) Basic Promotion Package Start with 51$-100$ and Dolor Rate Price-110TK</li>
                        <li class="list-group-item">c) Basic Promotion Package Start with 101$-1000$ and Dolor Rate Price-108TK</li>
                        <li class="list-group-item list-group-item-secondary" style="height:35px;"></li>
                    </ul>
                    <br>
                    <h4 class="text-center">To get service Plese contact with us</h4>
                    <br>
                    <ul class="social_link_list center">
                        <li>
                            <a href="#" class="social_btn facebook"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn skype"><i class="fab fa-skype"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn gmail"><i class="far fa-envelope"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social_btn"><i class="fas fa-phone"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Service modals end --}}

{{-- <div class="section_wrap service">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="service_sk_txt">
                    <h2 class="title">Services We Provide</h2>
                    <p class="desc">
                        Develpex Private Limited is one of the best and leading innovative software developing company in Bangladesh.
                        Promises to offers the world's best customized or ready-made mobile App, web, and desktop software.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                    </p>
                    <br>
                    <a href="#" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wrap_skew_img">
                    <div class="sk_img_wrap">
                        <img src="{{ asset('public/frontend/images/banner1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@if ($services)
    @foreach ($services as $item)
    @if ($loop->first)
    <div class="section_wrap service">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="service_sk_txt">
                        <h2 class="title">{{ $item->title }}</h2>
                        <p class="desc">
                            {{ $item->long_description }}
                        </p>
                        <br>
                        <a href="javascript:void(0)" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_{{ $item->id }}">View Details</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wrap_skew_img">
                        <div class="sk_img_wrap">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @continue
    @endif
    <div class="section_wrap service @if($loop->odd) service_ltr @endif">
        <div class="container @if($loop->even) color_circle @endif">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset($item->image) }}" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="service_sk_txt">
                        <h2 class="title">{{ $item->title }}</h2>
                        <p class="desc">
                            {{ $item->long_description }}
                        </p>
                        <br>
                        <a href="javascript:void(0)" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_{{ $item->id }}">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif


{{-- <div class="section_wrap service service_ltr">
    <div class="container color_circle">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('public/frontend/images/development.png') }}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="service_sk_txt">
                    <h2 class="title">Web Development</h2>
                    <p class="desc">
                        Develpex Private Limited is one of the best and leading innovative software developing company in Bangladesh.
                        Promises to offers the world's best customized or ready-made mobile App, web, and desktop software.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                    </p>
                    <br>
                    <a href="#" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_wrap service">
    <div class="container">
        <div class="row row_rev">
            <div class="col-lg-6">
                <div class="service_sk_txt">
                    <h2 class="title">Software Development</h2>
                    <p class="desc">
                        Develpex Private Limited is one of the best and leading innovative software developing company in Bangladesh.
                        Promises to offers the world's best customized or ready-made mobile App, web, and desktop software.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                    </p>
                    <br>
                    <a href="#" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('public/frontend/images/erp-software-development.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="section_wrap service">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('public/frontend/images/development.png') }}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="service_sk_txt">
                    <h2 class="title">SEO</h2>
                    <p class="desc">
                        Develpex Private Limited is one of the best and leading innovative software developing company in Bangladesh.
                        Promises to offers the world's best customized or ready-made mobile App, web, and desktop software.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                    </p>
                    <br>
                    <a href="#" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_wrap service">
    <div class="container">
        <div class="row row_rev">
            <div class="col-lg-6">
                <div class="service_sk_txt">
                    <h2 class="title">Training</h2>
                    <p class="desc">
                        Develpex Private Limited is one of the best and leading innovative software developing company in Bangladesh.
                        Promises to offers the world's best customized or ready-made mobile App, web, and desktop software.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                    </p>
                    <br>
                    <a href="#" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('public/frontend/images/erp-software-development.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="section_wrap service">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('public/frontend/images/development.png') }}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="service_sk_txt">
                    <h2 class="title">Facebook Marketing</h2>
                    <p class="desc">
                        Develpex Private Limited is one of the best and leading innovative software developing company in Bangladesh.
                        Promises to offers the world's best customized or ready-made mobile App, web, and desktop software.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                    </p>
                    <br>
                    <a href="#" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section_wrap service">
    <div class="container">
        <div class="row row_rev">
            <div class="col-lg-6">
                <div class="service_sk_txt">
                    <h2 class="title">Youtube Marketing</h2>
                    <p class="desc">
                        Develpex Private Limited is one of the best and leading innovative software developing company in Bangladesh.
                        Promises to offers the world's best customized or ready-made mobile App, web, and desktop software.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam debitis delectus magnam. Consectetur saepe minima unde itaque ratione harum perferendis sapiente consequuntur veritatis! Nihil sunt corrupti ab sequi cumque.
                    </p>
                    <br>
                    <a href="#" class="global_btn sml" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('public/frontend/images/erp-software-development.png') }}" alt="">
            </div>
        </div>
    </div>
</div> --}}
@endsection