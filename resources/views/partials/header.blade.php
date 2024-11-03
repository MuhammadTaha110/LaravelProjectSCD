<header>
        <nav class="bg-dark  navbar navbar-expand-lg">
            <div class="container-fluid px-5 py-3">
                <!-- Logo centered -->
                <div class="mx-auto">
                    <a class="navbar-brand" href="#">
                        <img src="https://images.freeimages.com/fic/images/icons/772/token_light/256/task_manager.png" alt="Logo" style="width: 60px; height:50px">
                    </a>
                </div>

                <!-- Menu bar top right -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                @auth
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class='logout-btn' type="submit">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
                </div>
            </div>
        </nav>
    </header>