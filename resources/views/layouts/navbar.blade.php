<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="https://www.mercubuana-yogya.ac.id/">
                    <span class="Logo"></span>
                    <span class="fw-bolder text-primary">
                        <img class="image" src="{{ asset('assets/assets/logonoback.png') }}" width="50px" alt="..." />UMBY</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/profil">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        @if (Route::has('login'))
                            <nav class="-mx-5 flex flex-1 justify-end">
                                @auth
                                    <a href="{{ url('/home') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                    </a>
                                @else
                                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                                    @if (Route::has('register'))
                                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
