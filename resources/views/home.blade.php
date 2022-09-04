@extends('layout.front.master')
@section('content')

    <!-- ======= Slide Section ======= -->

    @include('slide');
    <!-- ======= End Slide Section ======= -->

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
    </section>
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @if(sizeof($service) > 0)
                    @foreach($service as $value)
                        <div class="mt-4 col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                             data-aos-delay="100">
                            <div class="icon-box" style="width: 100%">
                                <a href="{{route('services.show',$value->id)}}" style="color: black">
                                    <img src="{{asset('images/services/'.$value->image)}}" alt=""
                                         style="width: 200px; height: 150px">
                                    <h4>{{$value->title}}</h4>
                                    <p>{!!$value->description !!}</p>
                                </a>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        @if(sizeof($category) > 0)
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach($category as $value)
                                <li data-filter=".filter-{{$value->id}}">{{$value->name}}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
                @if(sizeof($portfolio) > 0)
                    @foreach($portfolio as $value)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$value->category_id}}">
                            <img src="{{asset('images/portfolios/'.$value->image)}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{$value->title}}</h4>
                                <p>{{$value->category->name}}</p>
                                <a href="{{asset('images/portfolios/'.$value->image)}}" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox preview-link" title="{{$value->title}}"><i
                                        class="bx bx-plus"></i></a>
                                <a target="_blank" href="//{{$value->link}}" class="details-link"
                                   title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Clients</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                @if(sizeof($client) > 0)
                    @foreach($client as $value)
                        @if($value->image != '')
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="client-logo">
                                    <img src="{{asset('images/clients/'.$value->image)}}" class="img-fluid"
                                         style="height: 140px; width: 400px" alt="">
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

            </div>

        </div>
    </section><!-- End Our Clients Section -->

@endsection

@section('script')

@endsection
