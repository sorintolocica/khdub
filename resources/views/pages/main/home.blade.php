@extends ('layouts.master')
@section('content')
<p class="text-recente">Cele mai recente episoade</p>
<!-- Container pentru carousel -->
<div class="anime-carousel owl-carousel owl-theme">
    @foreach ($episodes as $episode)
        <!-- Primul set de carduri -->
        <div class="card">
            @if ($episode->anime)
                <!-- Verificăm dacă episodul are o referință către anime -->
                @php
                    $anime = $episode->anime;
                @endphp
                <img src="{{ asset('storage/' . $anime->image) }}" class="card-img-top" alt="{{ $episode->title }}">
            @endif
            <h5 class="card-title">{{ $episode->title }}</h5>
            <span class="episode-badge">Episodul {{$episode->episode_number}}</span>
            <a href="/episode/{{ $episode->id }}">
                <div class="card-overlay">
                    <button class="play-button">▶</button> <!-- Butonul de play -->
                </div>
            </a>
        </div>
    @endforeach
</div>
</div>
<br>
<div class="container-md">
    <p class="text-uppercase">Filme</p>
    <!-- Container pentru carousel -->
    <div class="filme-carousel owl-carousel owl-theme">
        @foreach($animes as $anime)
        <!-- Primul set de carduri -->
        <div class="card">
            <img src="{{ asset('storage/' . $anime['image']) }}" class="card-img-top" alt="{{$anime['title']}}">
            <h5 class="card-title">{{ $anime['title'] }}</h5>
            <span class="episode-badge">{{ $anime['status'] }}</span>
            <a href="{{ route('anime.show', $anime->id) }}">
            <div class="card-overlay">
                <button class="play-button">▶</button> <!-- Butonul de play -->
            </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="carousel-navigation">
        <button class="prev-btn"><span class="fa fa-chevron-left"></span></button>
        <button class="next-btn"><span class="fa fa-chevron-right"></span></button>
    </div>
    <br>
    <p class="text-uppercase">Seriale</p>
    <div class="seriale-carousel owl-carousel owl-theme">
        <!-- Primul set de carduri -->
        <div class="card">
            <img src="https://m.media-amazon.com/images/M/MV5BMjQ3NGE5NzItM2RlMi00YWE5LWJlOTAtYWRkMWRiY2Y0NmQ3XkEyXkFqcGdeQXVyMzgxODM4NjM@._V1_.jpg" class="card-img-top" alt="...">
            <h5 class="card-title">Heavenly Delusion</h5>
            <div class="card-overlay">
                <button class="play-button">▶</button> <!-- Butonul de play -->
            </div>
        </div>
        <!-- Al doilea set de carduri -->
        <div class="card">
            <img src="https://carturesti.md/img-prod/234173-0.jpeg" class="card-img-top" alt="...">
            <h5 class="card-title">Solo Leveling</h5>
            <div class="card-overlay">
                <button class="play-button">▶</button> <!-- Butonul de play -->
            </div>
        </div>
        <!-- Al treilea set de carduri -->
        <div class="card">
            <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1606259823i/52121611.jpg" class="card-img-top" alt="...">
            <h5 class="card-title">Kusuriya no Hitorigoto</h5>
            <div class="card-overlay">
                <button class="play-button">▶</button> <!-- Butonul de play -->
            </div>
        </div>
        <!-- Al patrulea set de carduri -->
        <div class="card">
            <img src="https://a.storyblok.com/f/178900/1060x1500/be2dfdc241/ragna-crimson-key-visual.jpeg/m/filters:quality(95)format(webp)" class="card-img-top" alt="...">
            <h5 class="card-title">Wednesday</h5>
            <div class="card-overlay">
                <button class="play-button">▶</button> <!-- Butonul de play -->
            </div>
        </div>
    </div>
    <div class="carousel-navigation">
        <button class="seriale-prev-btn"><span class="fa fa-chevron-left"></span></button>
        <button class="seriale-next-btn"><span class="fa fa-chevron-right"></span></button>
    </div>
</div>
<br>

@endsection
