@extends('layouts.master')

@section('content')
    <div class="container-md">
        <p class="text-titlu">Lista completă a seriilor</p>
    <div class="alaws321">
        <div class="alaws-wrap">
            @php
                $currentLetter = null;
            @endphp

            @foreach($animes as $anime)
                @php
                    $firstLetter = strtoupper(substr($anime->title, 0, 1));
                @endphp

                @if($loop->first || $firstLetter !== $currentLetter)
                    @php $currentLetter = $firstLetter; @endphp
                    <div class="alaws-group">
                        <div class="alaws-head">
                            <a name="{{ $currentLetter }}">{{ $currentLetter }}</a>
                        </div>
                        <div class="alaws-item">
                            <div class="alaws-title">
                                <a title="{{ $anime->title }}" href="{{ route('anime.show', $anime->id) }}">{{ $anime->title }}</a>
                            </div>
                        </div>
                        @else
                            <div class="alaws-item">
                                <div class="alaws-title">
                                    <a title="{{ $anime->title }}" href="{{ route('anime.show', $anime->id) }}">{{ $anime->title }}</a>
                                </div>
                            </div>
                        @endif

                        @if($loop->last || strtoupper(substr($animes[$loop->index + 1]->title, 0, 1)) !== $currentLetter)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    </div>
    <br>
@endsection
