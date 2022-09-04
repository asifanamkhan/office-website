@extends('layout.front.master')
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Contact</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Contact</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        @if(sizeof($setting) > 0)
        <iframe style="border:0; width: 100%; height: 350px;" src="{!! $setting[0]->google_location !!}" frameborder="0" allowfullscreen></iframe>
        @endif
    </div>

    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-10">

                    <div class="info-wrap">
                        <div class="row">
                            @if(sizeof($setting) > 0)
                                <div class="col-lg-4 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>{!! $setting[0]->address !!}</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>{{$setting[0]->email_1}}</p>
                                    <p>{{$setting[0]->email_2}}</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>{{$setting[0]->phone_1}}</p>
                                    <p>{{$setting[0]->phone_2}}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

            <div class="row mt-5 justify-content-center php-email-form" data-aos="fade-up" >
                <div class="col-lg-10">
                    <form action="{{route('contacts.store')}}" method="post" role="form" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                @if(isset($error) && array_key_exists('name',$error))
                                    <span class="is-invalid" style="color: red;">
                                        <strong>{{ $error['name'][0] }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                @if(isset($error) && array_key_exists('email',$error))
                                    <span class="is-invalid" style="color: red;">
                                        <strong>{{ $error['email'][0] }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            @if(isset($error) && array_key_exists('subject',$error))
                                <span class="is-invalid" style="color: red;">
                                        <strong>{{ $error['subject'][0] }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            @if(isset($error) && array_key_exists('message',$error))
                                <span class="is-invalid" style="color: red;">
                                    <strong>{{ $error['message'][0] }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>

    <!-- End Contact Section -->

@endsection()