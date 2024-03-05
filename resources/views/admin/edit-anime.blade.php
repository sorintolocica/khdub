@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Editează anime</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.edit-anime', $anime->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id">Anime ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{ $anime->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="title">Titlu</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $anime->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating" step="0.1" value="{{ $anime->rating }}" required>
                        </div>
                        <div class="form-group">
                            <label for="year">An</label>
                            <input type="number" class="form-control" id="year" name="year" value="{{ $anime->year }}" required>
                        </div>
                        <div class="form-group">
                            <label for="genres">Genuri</label>
                            <input type="text" class="form-control" id="genres" name="genres" value="{{ $anime->genres }}" required>
                        </div>
                        <div class="form-group">
                            <label for="studio">Studio</label>
                            <input type="text" class="form-control" id="studio" name="studio" value="{{ $anime->studio }}" required>
                        </div>
                        <div class="form-group">
                            <label for="episodes">Episoade</label>
                            <input type="number" class="form-control" id="episodes" name="episodes" value="{{ $anime->episodes }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Stare</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{ $anime->status }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descriere</label>
                            <textarea class="form-control" id="description" name="description" rows="8" style="height: 200px;" required>{{ $anime->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Imagine</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        @if ($anime->image)
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $anime->image) }}" alt="{{$anime['title']}}" style="max-width: 200px;">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Actualizează</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
