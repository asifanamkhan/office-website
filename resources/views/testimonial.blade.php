@extends('layout.front.master')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Testimonial</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Testimonial</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">

            <div class="row">
                @if(sizeof($testimonial) > 0)
                    @foreach($testimonial as $value)
                        <div class="col-lg-6 mb-4" data-aos="fade-up " >
                            <div class="testimonial-item" style="height: 300px; overflow-y: scroll">
                                <img src="{{asset('images/testimonials/'.$value->logo)}}" class="testimonial-img" alt="testimonial-image" style="height: 65px; width: 90px">
                                <h3>{{$value->name}}</h3>
                                <h4>{{$value->company}}</h4>

                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {!!$value->review  !!}
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section><!-- End Testimonials Section -->
@endsection
