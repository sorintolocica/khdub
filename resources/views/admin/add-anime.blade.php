@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Adaugă un anime nou</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.add-anime') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titlu</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Type</label>
                            <input type="text" class="form-control" id="type" name="type" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="year">An</label>
                            <input type="number" class="form-control" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label for="genres">Genuri</label>
                            <input type="text" class="form-control" id="genres" name="genres" required>
                        </div>
                        <div class="form-group">
                            <label for="studio">Studio</label>
                            <input type="text" class="form-control" id="studio" name="studio" required>
                        </div>
                        <div class="form-group">
                            <label for="episodes">Episoade</label>
                            <input type="number" class="form-control" id="episodes" name="episodes" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Stare</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descriere</label>
                            <textarea class="form-control" id="description" name="description" rows="8" style="height: 200px;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Imagine</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Adaugă</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
