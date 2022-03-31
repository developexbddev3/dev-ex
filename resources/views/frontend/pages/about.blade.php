@extends('frontend.layout.master')


@section('content')

<div class="section_wrap">
    <div class="container">
        <div class="section_header">
            <div class="side_dash">
                <h2 class="title">About Us</h2>
            </div>
        </div>
        <p>
            Developex Private Ltd is an independent software development and consulting company. It was founded in 2018. We as a professional software-development company are highly concerned with the quality of our solutions and services. Moreover, our team constantly works on developing and improving our service performance to satisfy our customers and maintain long-term cooperation with them.
        </p>
        <img src="{{ asset('frontend/images/programmin.jpg') }}" alt="About">
        <br>
        <p>
            The company was founded by a team of enthusiastic IT specialists who wanted to overcome the routine and create a company that would act in the market not only for business success but for the sake of IT itself. Thus, the mission of the company was defined – to contribute to forward-looking transformation of the society through software development.
        </p> 
    </div>
</div>

<div class="section_wrap">
    <div class="container">
        <div class="mission_vision_grid">
            <div class="mission_vision">
                <div class="icon_wrap">
                    <div class="icon">
                        <img src="{{ asset('frontend/img/png/target.png') }}" alt="">
                    </div>
                </div>
                <h3>Our Vision</h3>
                <p class="txt">
                    Our vision is to become a world-class software development and technology provider and to provide clients with innovated technical and business solutions by utilizing industry standards and technology. To provide innovative technology solutions that enable financial institutions and corporates across the world to deliver their full potential to their clients.
                </p>
            </div>
            <div class="mission_vision mission">
                <div class="icon_wrap">
                    <div class="icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                </div>
                <h3>Our Mission</h3>
                <p class="txt">
                    To evolve into a globally competent software house offering quality software and services to customers around the world as well as in Bangladesh. The guiding principle in operating the business has always been: Providing excellent enterprise IT products at the most competitive prices with excellent customer support.
                </p>
            </div>
            <div class="mission_vision team_relation">
                <div class="icon_wrap">
                    <div class="icon">
                        <i class="fa fa-link"></i>
                    </div>
                </div>
                <h3>Teamwork & Relation</h3>
                <p class="txt">
                    Great stress is laid on proper communication, transparency and human relations. We not only develop products, we develop relationships. Through teamwork, with every new day the quest for acquiring new competencies continues. Forever searching, experimenting, innovating, learning, and challenging our competencies to create new opportunities.
                </p>
            </div>
        </div>
    </div>
</div>


@endsection