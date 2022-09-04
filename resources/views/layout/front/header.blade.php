<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{route('home')}}"><span>Codex</span>Shaper</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="{{route('home')}}"  class="{{ \Request::is('/') ? 'active' : ''  }}">Home</a></li>

                <li class="dropdown"><a href="#" class="{{ \Request::is('abouts') ? 'active' : ''  }}"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('abouts.index')}}" class="{{ \Request::is('abouts') ? 'active' : ''  }}">About Us</a></li>
                        <li><a href="{{route('teams.index')}}" class="{{ \Request::is('teams') ? 'active' : ''  }}">Team</a></li>
                        <li><a href="{{route('testimonials.index')}}" class="{{ \Request::is('testimonials') ? 'active' : ''  }}">Testimonials</a></li>
                    </ul>
                </li>

                <li><a href="{{route('services.index')}}" class="{{ \Request::is('services') ? 'active' : ''  }}">Services</a></li>
                <li><a href="{{route('portfolios.index')}}" class="{{ \Request::is('portfolios') ? 'active' : ''  }}">Portfolio</a></li>
                <li><a href="{{route('contacts.index')}}" class="{{ \Request::is('contacts') ? 'active' : ''  }}">Contact</a></li>


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="header-social-links d-flex">
            @if(sizeof($setting) > 0)
                <a href="{{$setting[0]->twitter_link}}" class="twitter"><i class="bu bi-twitter"></i></a>
                <a href="{{$setting[0]->facebook_link}}" class="facebook"><i class="bu bi-facebook"></i></a>
                <a href="{{$setting[0]->instagram_link}}" class="instagram"><i class="bu bi-instagram"></i></a>
                <a href="{{$setting[0]->linkedin_link}}" class="linkedin"><i class="bu bi-linkedin"></i></a>
            @endif
        </div>

    </div>
</header>
