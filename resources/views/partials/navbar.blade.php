<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F8F6F2;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">
                        <img src="{{ asset('/images/logo.png') }}" alt="DapurKu logo" width="35" height="35" style="border-radius: 50%;">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <form class="d-flex">
                        <input class="form-control" type="search" placeholder="Cari resep di sini" aria-label="Search" style="border-radius: 25px;" href="/dashboard">
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest -->

                @auth
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li> -->
                    {{ dd(Auth::user()) }}
                @endauth
            </ul>
        </div>
    </div>
</nav>
