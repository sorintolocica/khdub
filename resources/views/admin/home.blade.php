@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Panoul de control</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Numarul de anime-uri</h4>
                    </div>
                    <div class="card-body">
                        12
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Numarul de episoade</h4>
                    </div>
                    <div class="card-body">
                        122
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Toți utilizatorii</h4>
                    </div>
                    <div class="card-body">
                        45
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="section-header">
            <h1>Postări</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped custom-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagine</th>
                                        <th>Titlu</th>
                                        <th>Categoria</th>
                                        <th>Publicat</th>
                                        <th>Acțiuni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($episodes as $episode)
                                        <tr>
                                            <td>{{ $episode->id }}</td>
                                            @php
                                                $anime = $episode->anime;
                                            @endphp
                                            <td><img src="{{ asset('storage/' . $anime['image']) }}" alt="{{$anime['title']}}"></td>
                                            <td><b>{{ $episode->title }}</b></td>
                                            <td>{{ $anime['title'] }}</td>
                                            <td>{{ $episode->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit-episode', $episode->id) }}" class="btn btn-primary">Editare</a>
                                                <a href="{{ route('admin.delete-episode', $episode->id) }}" class="btn btn-danger"
                                                   onclick="event.preventDefault(); if(confirm('Ești sigur că vrei să ștergi acest episod?')) document.getElementById('delete-episode-form-{{ $episode->id }}').submit();">
                                                    Șterge
                                                </a>
                                                <form id="delete-episode-form-{{ $episode->id }}" action="{{ route('admin.delete-episode', $episode->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
