@extends('layout.front.master')
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Services</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('services.index')}}">Service</a></li>
                    <li>@if($service){{$service->title}}@endif</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @if($service)
                    <div class="mt-4 d-flex align-items-stretch" data-aos="zoom-in"
                         data-aos-delay="100">
                        <div class="icon-box" style="width: 100%">
                            <img src="{{asset('images/services/'.$service->image)}}" alt="" style="width: 500px; height: 450px">
                            <h4><a href="#">{{$service->title}}</a></h4>
                            <p>{!!$service->description !!}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Services Section -->



@endsection()
