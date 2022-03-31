@extends('frontend.layout.master')


@section('content')
    <div class="banner_hero" id="hero_particles">
        {{-- <img class="banner_img" src="https://cdn.wallpapersafari.com/3/63/Hhcoe0.jpg" alt=""> --}}
        {{-- <img class="banner_img" src="https://mprinth.com/images/products/201128064152-0ba3d60362c7e6d256cfc1f37156bad9.jpg" alt=""> --}}
        {{-- <img class="banner_img" src="https://millercenter.rutgers.edu/wp-content/uploads/2021/05/Home-Four-Banner-Background-Image.png" alt=""> --}}
        <div class="hero_text">
            @if ($hero_data)
                <h2 class="hero_title">{{ $hero_data->title }}</h2>
                <p>{{ $hero_data->description }}.</p>
                <br><br>
                <a href="{{ route('services') }}" class="global_btn">Our Services</a>
            @else
                <h2 class="hero_title">Developex Private Ltd A Leading Software Company</h2>
                <p>Developex Private Ltd is the most creative software company in Bangladesh. It is one of the best software development company for custom mobile, web and desktop software development.</p>
                <br><br>
                <a href="{{ route('services') }}" class="global_btn">Our Services</a>
            @endif
        </div>
    </div>


    {{-- <div class="section_header">
        <div class="side_dash">
            <h2 class="title">About Us</h2>
        </div>
    </div> --}}
    <div class="section_wrap">
        <div class="container">
            <div class="row row_rev">
                <div class="col-lg-6">
                    <h2 class="title">About Us</h2>
                    <p>
                        Developex Private Ltd is an independent software development and consulting company. It was founded in 2018. We as a professional software-development company are highly concerned with the quality of our solutions and services. Moreover, our team constantly works on developing and improving our service performance to satisfy our customers and maintain long-term cooperation with them.
                    </p>
                    <p>
                        <br>
                        <a class="global_btn sml" href="{{ route('about') }}">Read more</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('frontend/images/programmin.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    
    <div class="section_wrap">
        <div class="container">
            <div class="upper_grid">
                <a href="#" class="box">
                    <div class="icon">
                        {{-- <i class="fas fa-chalkboard-teacher"></i> --}}
                        <img src="{{ asset('frontend/img/png/presentation1.png') }}" alt="">
                    </div>
                    <span>Training</span>
                </a>
                <a href="#" class="box">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/png/shopping-cart.png') }}" alt="">
                    </div>
                    <span>Dexmart</span>
                </a>
                <a href="#" class="box">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/png/career.png') }}" alt="">
                    </div>
                    <span>Blancebd</span>
                </a>
                <a href="#" class="box">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/png/prototype.png') }}" alt="">
                    </div>
                    <span>ENGINEERING</span>
                </a>
                <a href="#" class="box">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/png/web-development.png') }}" alt="">
                    </div>
                    <span>Development</span>
                </a>
                <a href="#" class="box">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/png/profit1.png') }}" alt="">
                    </div>
                    <span>Business</span>
                </a>
            </div>
        </div>
    </div>
    <div class="section_header">
        <div class="side_dash">
            <h2 class="title">Services We Provide</h2>
        </div>
        <p class="desc">
            Developex Private Ltd focuses on off shore development at our excellence center in Bangladesh. An in-depth knowledge of various technology areas enables us to provide end-to-end solutions and services. With our ‘Web of Participation’, we maximize the benefits of our depth, diversity and delivery capability, ensuring adaptability to client needs,thus bringing out the most innovative solutions in every business and technology domain.
        </p>
    </div>



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

    <div class="container">
        <div class="service_grid">
            @foreach ($services as $item) 
            <div class="service_box">
                <div class="service_banner">
                    <img src="{{ asset($item->image) }}" alt="logo">
                </div>
                <div class="title">
                    <h3>{{ $item->title }}</h3>
                </div>
                <div class="desc">
                    <p>{{ $item->short_description }}</p>
                </div>
                <a href="#" class="g_serv" data-bs-toggle="modal" data-bs-target="#service_modal_{{ $item->id }}">View Details</a>
            </div>
            @endforeach
            {{-- <div class="service_box">
                <div class="service_banner">
                    <img src="{{ asset('public/frontend/images/Good-Software-Developers.jpg') }}" alt="logo">
                </div>
                <div class="title">
                    <h3>Sotware Development</h3>
                </div>
                <div class="desc">
                    <p>Developex Private Ltd development services and has experience in building all kinds of small, medium, enterprise-level software using digital technologies.</p>
                </div>
                <a href="#" class="g_serv" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
            </div>
            <div class="service_box">
                <div class="service_banner">
                    <img src="{{ asset('public/frontend/images/erp-software-development.png') }}" alt="logo">
                </div>
                <div class="title">
                    <h3>ERP</h3>
                </div>
                <div class="desc">
                    <p>We provide end to end eCommerce website solutions to all kinds of small, medium and large businesses. Our ERP Softwares are optimized for desktop, mobile, and tablets</p>
                </div>
                <a href="#" class="g_serv" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
            </div>
        
            <div class="service_box">
                <div class="service_banner">
                    <img src="{{ asset('public/frontend/images/seo.jpg') }}" alt="logo">
                </div>
                <div class="title">
                    <h3>SEO</h3>
                </div>
                <div class="desc">
                    <p>earch Engine Optimization is an important part of your website. You might have a better website or an eCommerce store but without SEO, there are only a few people who will know about your business.</p>
                </div>
                <a href="#" class="g_serv" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
            </div>
                                    
            <div class="service_box">
                <div class="service_banner">
                    <img src="{{ asset('public/frontend/images/digital-marketing.jpg') }}" alt="logo">
                </div>
                <div class="title">
                    <h3>Digital Marketing </h3>
                </div>
                <div class="desc">
                    <p>Social Media Marketing Services Provider Company in Bangladesh can help you to define your targeted audience to find out who is the audience looking for your products & services on Social Media.</p>
                </div>
                <a href="#" class="g_serv" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
            </div>
                                    
            <div class="service_box">
                <div class="service_banner">
                    <img src="{{ asset('public/frontend/images/domain-hosting.jpg') }}" alt="logo">
                </div>
                <div class="title">
                    <h3>Domain Hosting</h3>
                </div>
                <div class="desc">
                    <p>We provide Domain Hosting as well as customizations for your needs. Protect your domain from accidental or unauthorized transfer through our free domain theft protection.</p>
                </div>
                <a href="#" class="g_serv" data-bs-toggle="modal" data-bs-target="#service_modal_1">View Details</a>
            </div> --}}
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a href="{{ route('services') }}" class="global_btn sml" style="min-width: 200px;text-align:center;">All Services</a>
        </div>
    </div>

    @if (count($trainings))  
    <div class="section_wrap">
        <div class="container">
            <div class="section_header">
                <div class="side_dash">
                    <h2 class="title">Training</h2>
                </div>
            </div>
            <div class="training_grid">
                @foreach ($trainings as $training)
                <a href="{{ route('training.details', $training) }}" class="training">
                    <div class="thumbnail">
                        <img src="{{ asset($training->thumbmail) }}" alt="">
                    </div>
                    <h4 class="name">
                        {{ $training->title }}
                    </h4>
                    <div class="footer" style="border-top: 1px solid #ECECEC;">
                        <span> {{ $training->price }} </span>
                        <span class="details">More Information</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if (count($clients))   
    <div class="section_wrap">
        <div class="container">
            <div class="section_header">
                <div class="side_dash">
                    <h2 class="title">Our Client</h2>
                </div>
            </div>
            <marquee behavior="scroll">
                <div class="client_grid">
                    @foreach ($clients as $client)    
                    <div class="itm">
                        <img src="{{ $client->logo }}" alt="">
                    </div>
                    @endforeach
                </div>
            </marquee>
        </div>
    </div>
    @endif

    <div class="location_map">
      <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.2892896343556!2d90.36226841536299!3d23.772710693839723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c130c90f07a5%3A0x5dd9af691773816b!2sDevelopEx%20Private%20Limited!5e0!3m2!1sen!2sus!4v1641802422495!5m2!1sen!2sus" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

@push('script')
<script src="{{ asset('frontend/js/particles.min.js') }}"></script>
<script>
// hero_particles
particlesJS('hero_particles',
  {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 700
        }
      },
      "color": {
        "value": "#ddd"
      },
      "opacity": {
        "value": 0.5,
        "random": true,
      },
      "size": {
        "value": 5,
        "random": true,
      },
    },
  }
);
</script>
@endpush

@endsection