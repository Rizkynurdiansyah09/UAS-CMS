<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('layouts.navbar')
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            @if (!is_null($content))
                                <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                    <div class="text-uppercase">{{ $content->title_1 }}</div>
                                </div>
                                <div class="fs-3 fw-light text-muted">{{ $content->title_2 }}</div>
                                <h1 class="display-3 fw-bolder mb-5"><span
                                        class="text-gradient d-inline">{{ $content->title_3 }}</span></h1>
                                <div
                                    class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                    <a class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-bolder"
                                        href="/profil">{{ $content->button_left }}</a>
                                    <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder"
                                        href="/contact">{{ $content->button_right }}</a>
                                </div>
                            @else
                                <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                    <div class="text-uppercase">Design</div>
                                </div>
                                <div class="fs-3 fw-light text-muted">I Can help</div>
                                <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Get
                                        online</span></h1>
                                <div
                                    class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                    <a class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-bolder" href="#!">Resume</a>
                                    <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder"
                                        href="#!">Project</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <!-- Header profile picture-->
                        <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                            <div class="profile bg-gradient-primary-to-secondary">
                                <!-- TIP: For best results,  a photo with a transparent background like the demo example below-->
                                <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                @if (!is_null($content))
                                    <img class="profile-img" src="{{ asset('storage/' . $content->image_path) }}"
                                        alt="Profile Image" width="850">
                                @else
                                    <img class="profile-img" src="{{ asset('assets/assets/profile.png') }}"
                                        alt="..." >
                                @endif
                                <div class="dots-1">
                                    <!-- SVG Dots-->
                                    <!-- END of SVG dots-->
                                </div>
                                <div class="dots-2">
                                    <!-- SVG Dots-->
                                    <!-- END of SVG dots-->
                                </div>
                                <div class="dots-3">
                                    <!-- SVG Dots-->
                                    <!-- END of SVG dots-->
                                </div>
                                <div class="dots-4">
                                    <!-- SVG Dots-->
                                    <!-- END of SVG dots-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About Section-->
        <section class="bg-light py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        @if (!is_null($content))
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder text-center"><span
                                        class="text-gradient">{{ $content->about_me_title }}</span></h2>
                                <p class="lead fw-light text-center mb-4">{{ $content->about_me_description }}</p>
                                <div class="d-flex justify-content-center fs-2 gap-4">
                                    <a class="text-gradient" href="https://www.instagram.com/rizky.nrd/"target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a class="text-gradient" href="https://www.youtube.com/channel/UCgl_aDQILCilqOs5JfsN3ig"target="_blank"><i class="bi bi-youtube"></i></a>
                                    <a class="text-gradient" href="https://github.com/Rizkynurdiansyah09"target="_blank"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span>
                                </h2>
                                <p class="lead fw-light mb-4">My name is Start Bootstrap and I help brands grow.</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit
                                    dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid
                                    cumque
                                    officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                                <div class="d-flex justify-content-center fs-2 gap-4">
                                    <a class="text-gradient" href="https://www.instagram.com/rizky.nrd/"target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a class="text-gradient" href="https://www.youtube.com/channel/UCgl_aDQILCilqOs5JfsN3ig"target="_blank"><i class="bi bi-youtube"></i></a>
                                    <a class="text-gradient" href="https://github.com/Rizkynurdiansyah09"target="_blank"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
