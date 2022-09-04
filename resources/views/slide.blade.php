<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">

            @if(sizeof($slides) > 0)
                @foreach($slides as $slide)
                <div>{{$loop->iteration}}</div>
                <!-- Slide  -->
                    <div class="carousel-item @if($loop->first) active @endif" style="background-image: url({{asset('images/slides/'.$slide->image)}});">
                        <div class="carousel-container">
                            <div class="carousel-content animate__animated animate__fadeInUp">
                                <h2>{{$slide->title}}</h2>
                                <p>{!! $slide->description !!}</p>
                                <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        @if(sizeof($slides) > 1)
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        @endif
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    </div>
</section>
