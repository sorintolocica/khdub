<!-- Modal de înregistrare -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Creează un cont nou</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center"> <!-- Utilizează clasa col-md-6 pentru a limita lățimea imaginii -->
                    <img src="https://pngimg.com/d/anime_girl_PNG96.png" alt="Register" class="img-register">
                </div>
                <!-- Formular pentru înregistrare -->
                <form id="signupForm" method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Câmpuri pentru înregistrare -->
                    <div class="mb-3">
                        <label for="signupUsername" class="form-label">Nume de utilizator</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Introduceți numele complet" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Adresă de email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Introduceți adresa de email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Parolă</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Introduceți parola" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="signupPasswordConfirm" class="form-label">Confirmă parola</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmați parola" required>
                    </div>
                    <!-- Alte câmpuri pentru înregistrare -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anulare</button>
                <button type="submit" class="btn btn-primary" form="signupForm">Înregistrare</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal de autentificare -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Autentificare</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center"> <!-- Utilizează clasa col-md-6 pentru a limita lățimea imaginii -->
                    <img src="https://www.pngall.com/wp-content/uploads/5/Cat-Anime-Girl-PNG.png" alt="Register" class="img-register">
                </div>
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresă de email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Parolă</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ține-mă minte</label>
                    </div>
                </form>
                <p class="text-center">Nu ai un cont? <a href="#signupModal" data-bs-toggle="modal" id="signupLink">Creează un cont nou</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anulare</button>
                <button type="submit" class="btn btn-primary" form="loginForm">Autentificare</button>
            </div>
        </div>
    </div>
</div>


<div class="container-md">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="logo-image">
                    <img src="{{asset('./assets/img/logo.gif')}}" class="img-fluid">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Acasă</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tipuri seriale
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Seriale</a></li>
                            <li><a class="dropdown-item" href="#">Anime</a></li>
                            <li><a class="dropdown-item" href="#">Filme</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/az-list">AZ list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Echipa</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Caută..." id="searchInput" aria-label="Search">
                    <div id="searchResults" class="search-results"></div>
                </form>
                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var searchInput = document.getElementById('searchInput');
                        var searchResults = document.getElementById('searchResults');

                        searchInput.addEventListener('input', function() {
                            var query = this.value.trim();

                            if (query.length === 0) {
                                searchResults.innerHTML = ''; // Golește rezultatele dacă nu există nicio căutare
                                searchResults.style.display = 'none';
                                return;
                            }

                            // Trimite o cerere AJAX către server pentru a căuta postările
                            axios.get('/search-anime', {
                                params: {
                                    query: query
                                }
                            })
                                .then(function(response) {
                                    var posts = response.data;

                                    // Afisează rezultatele în lista de sugestii
                                    searchResults.innerHTML = '';

                                    posts.forEach(function(post) {
                                        var postElement = document.createElement('div');
                                        postElement.classList.add('post-result');

                                        var imageElement = document.createElement('img');
                                        imageElement.src = '/storage/' + post.image;
                                        postElement.appendChild(imageElement);

                                        var titleElement = document.createElement('div');
                                        titleElement.textContent = post.title;
                                        postElement.appendChild(titleElement);

                                        // Adaugă un eveniment de click pentru a face ce dorești cu postarea selectată
                                        postElement.addEventListener('click', function() {
                                            // Poți redirecționa către pagina postării sau să faci altă acțiune
                                            window.location.href = '/anime/' + post.id; // Redirecționează către pagina episodului
                                        });

                                        searchResults.appendChild(postElement);
                                    });

                                    searchResults.style.display = 'block'; // Arată rezultatele
                                })
                                .catch(function(error) {
                                    console.error('Eroare la căutare:', error);
                                });
                        });
                    });
                </script>

                @guest
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Autentificare <i class="fas fa-sign-in-alt"></i>
                </button>
                @endguest

                @auth
                    <div class="profile">
                        <div class="profile-container">
                            <img src="{{ auth()->user()->image }}" class="profile-image" alt="Profile Image" id="profile-image">
                                <button class="profile-info">
                                    <i class="fas fa-user"></i>
                                    <span>Profil</span>
                                </button>
                            <button class="profile-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Deconectare</span>
                            </button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
    </nav>
</div>
