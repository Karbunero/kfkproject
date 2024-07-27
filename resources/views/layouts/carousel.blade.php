<!-- resources/views/layouts/carousel.blade.php -->

<div
    id="carouselExample"
    class="carousel slide"
    data-ride="carousel"
    style="max-width: 1000px; margin: auto; position: relative;">
    <div class="carousel-indicators">
        <!-- <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExample" data-slide-to="1"></li> 
        <li data-target="#carouselExample" data-slide-to="2"></li> -->
    </div>
    <div class="carousel-inner">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach (App\Models\Banner::all() as $ss => $banner)
                <div
                    class="carousel-item {{ $ss == 0 ? 'active' : '' }}"
                    style="max-height: 400px;">
                    <img
                        class="d-block w-100"
                        src="{{ $banner->foto ? asset('foto/banner/' . $banner->foto) : asset('foto/banner/user.png') }}"
                        alt="Banner {{ $ss + 1 }}">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <a
        class="carousel-control-prev"
        href="#carouselExample"
        role="button"
        data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a
        class="carousel-control-next"
        href="#carouselExample"
        role="button"
        data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
