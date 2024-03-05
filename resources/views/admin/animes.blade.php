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
                                            <th>Id</th>
                                            <th>Imagine</th>
                                            <th>Denumirea anime</th>
                                            <th>Numarul de episoade</th>
                                            <th>Status</th>
                                            <th>Tipul seriei</th>
                                            <th>Acțiuni</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($animes as $anime)
                                            <tr>
                                                <td>{{$anime['id']}}</td>
                                                <td><img src="{{ asset('storage/' . $anime['image']) }}" alt="{{$anime['title']}}"></td>
                                                <td>{{ $anime['title'] }}</td>
                                                <td>{{ $anime['episodes'] }} episoade</td>
                                                <td>{{ $anime['status'] }}</td>
                                                <td>{{ $anime['type'] }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit-anime', $anime->id) }}" class="btn btn-primary">Editare</a>
                                                    <a href="{{ route('admin.anime.delete', $anime->id) }}" class="btn btn-danger"
                                                       onclick="event.preventDefault(); if(confirm('Ești sigur că vrei să ștergi acest anime?')) document.getElementById('delete-form-{{ $anime->id }}').submit();">
                                                        Șterge
                                                    </a>
                                                    <form id="delete-form-{{ $anime->id }}" action="{{ route('admin.anime.delete', $anime->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- Adaugă aici rândurile pentru alte postări -->
                                        </tbody>
                                    </table>

                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>

        </section>
@endsection
