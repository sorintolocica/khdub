@extends('layouts.master')

@section('content')

    <div class="container-md">
        <p class="text-titlu">{{ $episode -> title }}</p>
        <p class="text-description">{{ $episode -> description }}</p>
        <ul class="xo-tab-links">
            @foreach ($tabs_name as $index => $tab_name)
                <li class="{{ $index == 0 ? 'current' : '' }}" data-tab="tab{{ $index+1 }}">{{ $tab_name }}</li>
            @endforeach
        </ul>

        @foreach ($tabs_url as $index => $tab_url)
            <div class="xo-tab-content{{ $index == 0 ? ' current' : '' }}" id="tab{{ $index+1 }}">
                <iframe allowfullscreen="true" frameborder="0" height="600" marginheight="0" marginwidth="0" scrolling="no" src="{{ $tab_url }}" width="1250"></iframe>
            </div>
    @endforeach
        <div class="episode-buttons">
            @if ($episode->previousEpisode())
                <a href="{{ route('pages.main.episode', ['id' => $episode->anime->id, 'episode_number' => $episode->previousEpisode()->episode_number]) }}" class="button-prev">
                    <i class="fa fa-chevron-left"></i> Episodul anterior
                </a>
            @endif

            <a href="{{ route('anime.show', ['id' => $episode->anime->id]) }}" class="button-all">Toate episoadele</a>

            @if ($episode->nextEpisode())
                <a href="{{ route('pages.main.episode', ['id' => $episode->anime->id, 'episode_number' => $episode->nextEpisode()->episode_number]) }}" class="button-next">
                    Următorul episod <i class="fa fa-chevron-right"></i>
                </a>
            @endif
        </div>
        <p class="text-titlu">Adaugă un comentariu</p>
        <div class="row">
            <form id="commentForm">
                <div class="form-group">
                    <label for="userName">Nume:</label>
                    <input type="text" class="form-control" id="userName" required>
                </div>
                <form id="commentForm">
                    <div class="form-group">
                        <label for="userName">Email:</label>
                        <input type="text" class="form-control" id="email" required>
                    </div>
                <div class="form-group">
                    <label for="commentText">Comentariu:</label>
                    <textarea class="form-control" id="commentText" rows="3" required></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Adăugare Comentariu</button>
            </form>
            <p class="text-titlu">Comentarii</p>
                <div class="comment">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pinimg.com/564x/a4/57/c0/a457c0a1841a72f212ee1a0ea169f6c3.jpg" alt="User Profile" class="profile-image-com">
                        <div>
                            <div class="meta">
                                <span class="author">Daniel</span> - <span class="timestamp">March 5, 2024</span>
                            </div>
                            <div class="content">
                                <p>Super tare episodul.</p>
                            </div>
                            <div class="actions">
                                <a href="#">Răspunde</a>
                                <a href="#">Editare</a>
                                <a href="#">Ștergere</a>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
