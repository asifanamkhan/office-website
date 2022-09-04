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
    </section>
    <!-- End Services Section -->



@endsection()
