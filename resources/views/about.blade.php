@extends('layout.front.master')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>About</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>About</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                @if(sizeof($about) > 0)
                    @foreach($about as $value)
                        <div class="col-lg-6" data-aos="fade-right">
                            <h2>{{$value->title}}</h2>
                            <h3>{{$value->sub_title}}</h3>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                            {!! $value->description !!}
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Our <strong>Team</strong></h2>
                <p>We have a strong qualified and vast experienced team</p>
            </div>

            <div class="row">
                @if(sizeof($team) > 0)
                    @foreach($team as $value)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member" data-aos="fade-up">
                                <div class="member-img">
                                    <img src="{{asset('images/teams/'.$value->image)}}" style="width: 306px; height: 306px" class="img-fluid" alt="">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{$value->name}}</h4>
                                    <span>{{$value->designation}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Our Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Our <strong>Skills</strong></h2>
                <p>We have a strong skilled and vast experienced on these technology</p>
            </div>

            <div class="row skills-content">
                @if(sizeof($tech) > 0)
                    @foreach($tech as $value)
                        <div class="col-lg-6" data-aos="fade-up">
                            <div class="progress">
                                <span class="skill">{{$value->name}} <i class="val">{{$value->skill_level}}</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$value->skill_level}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Our Skills Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Clients</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                @if(sizeof($client) > 0)
                    @foreach($client as $value)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="{{asset('images/clients/'.$value->image)}}" class="img-fluid" style="height: 140px; width: 400px" alt="">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>
    @endsection
