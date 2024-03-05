@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Editează episodul</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.edit-episode', $episode->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id">Episode ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{ $episode->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="title">Titlu</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $episode->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrierea episodului</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ $episode->description }}" required>
                        </div>
                        <div class="form-group">
                            <label for="episode_number">Număr Episod</label>
                            <input type="number" name="episode_number" id="episode_number" class="form-control" value="{{ $episode->episode_number }}" required>
                        </div>
                        <div id="tab_links_container">
                            <div class="form-group">
                                <label>Tab Links</label>
                                @foreach ($tabs_name as $index => $tab_name)
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" name="tab_name[]" class="form-control" value="{{ $tab_name }}" placeholder="Nume" required>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <input type="url" name="tab_url[]" class="form-control" value="{{ $tabs_url[$index] }}" placeholder="URL" required>
                                        </div>
                                        <div class="col-md-1 mb-3">
                                            @if ($index > 0)
                                                <button type="button" class="btn btn-danger" onclick="removeTabLink(this)">-</button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addTabLink()">Adaugă Tab Link</button>
                        <hr>
                        <div class="form-group">
                            <label for="series_id">Categoria</label>
                            <select name="series_id" id="series_id" class="form-control" required>
                                <option value="">Selectează categoria</option>
                                @php
                                    $animes = \App\Models\Series::all();
                                @endphp
                                @foreach ($animes as $anime)
                                    <option value="{{ $anime->id }}" {{ $episode->anime_id == $anime->id ? 'selected' : '' }}>{{ $anime->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizează Episod</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addTabLink() {
            var container = document.getElementById('tab_links_container');
            var row = document.createElement('div');
            row.className = 'row mb-3';

            var col1 = document.createElement('div');
            col1.className = 'col-md-6 mb-3';
            var input1 = document.createElement('input');
            input1.type = 'text';
            input1.name = 'tab_name[]';
            input1.className = 'form-control';
            input1.placeholder = 'Nume';
            input1.required = true;
            col1.appendChild(input1);

            var col2 = document.createElement('div');
            col2.className = 'col-md-5 mb-3';
            var input2 = document.createElement('input');
            input2.type = 'url';
            input2.name = 'tab_url[]';
            input2.className = 'form-control';
            input2.placeholder = 'URL';
            input2.required = true;
            col2.appendChild(input2);

            var col3 = document.createElement('div');
            col3.className = 'col-md-1 mb-3';
            var removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-danger';
            removeBtn.textContent = '-';
            removeBtn.onclick = function () {
                removeTabLink(row);
            };
            col3.appendChild(removeBtn);

            row.appendChild(col1);
            row.appendChild(col2);
            row.appendChild(col3);

            container.appendChild(row);
        }

        function removeTabLink(row) {
            var container = document.getElementById('tab_links_container');
            container.removeChild(row);
        }
    </script>
@endsection
