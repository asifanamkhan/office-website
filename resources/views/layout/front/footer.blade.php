<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    @if(sizeof($setting) > 0)
                        <h3>{!! $setting[0]->name !!}</h3>
                        <p>
                            {!! $setting[0]->address !!}
                            <br><br>
                            <strong>Phone:</strong> {!! $setting[0]->phone_1 !!}<br>
                            <strong>Email:</strong> {!! $setting[0]->email_1 !!}<br>
                        </p>
                    @endif
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('abouts.index')}}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('services.index')}}">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('terms')}}">Terms and conditions</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('privacy-policy')}}">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Get update of our service in your email</p>
                    <div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show session-message" role="alert">
                                <strong>{{ session('success') }}</strong>

                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show session-message" role="alert">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
                    </div>
                    <form action="{{route('newsletters.store')}}" method="post">
                        @csrf
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>CodexShaper</span></strong>. All Rights Reserved
            </div>

        </div>
        @if(sizeof($setting) > 0)
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="{{$setting[0]->twitter_link}}" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="{{$setting[0]->facebook_link}}" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="{{$setting[0]->instagram_link}}" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="{{$setting[0]->linkedin_link}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        @endif
    </div>
</footer>
