@extends('layout.front.master')
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Services</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Services</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

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
                                <a href="{{asset('images/portfolios/'.$value->image)}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$value->title}}"><i class="bx bx-plus"></i></a>
                                <a target="_blank" href="//{{($value->link)}}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Portfolio Section -->


@endsection()
