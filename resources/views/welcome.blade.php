<!DOCTYPE html>
<html lang="en">

<head>
    <title>Super-puper blog!</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme-1.css') }}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <header class="header text-center">
        <h1 class="blog-name pt-lg-4 mb-0"><a href="index.html">My Blog FYI</a></h1>
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
        <nav class="navbar navbar-expand-lg navbar-dark">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navigation" class="navbar-collapse flex-column">
                <div class="profile-section pt-3 pt-lg-0">
                    <img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/profile.png" alt="image">

                    <div class="bio mb-3">Hi, my name is Anthony Doe. Briefly introduce yourself here. You can also provide a link to the about page.<br><a href="about.html">Find out more about me</a></div><!--//bio-->
                    <ul class="social-list list-inline py-3 mx-auto">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
                    </ul><!--//social-list-->
                    <hr>
                </div><!--//profile-section-->

                <ul class="navbar-nav flex-column text-left">
                    <li class="nav-item active">
                        <a class="nav-link" href="/"><i class="fas fa-home fa-fw mr-2"></i>Blog Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/questions"><i class="fas fa-bookmark fa-fw mr-2"></i>Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
                    </li>
                </ul>

                <div class="my-2 my-md-3">
                    <!-- <a class="btn btn-primary" href="https://themes.3rdwavemedia.com/" target="_blank">Get in Touch</a> -->
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <div class="main-wrapper">
        @if (Route::has('login'))
        <div class="login-menu">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            <a href="{{ url('/admin_panel') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div id="app">
            <App />
        </div>



        <footer class="footer text-center py-2 theme-bg-dark">

            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

        </footer>

    </div><!--//main-wrapper-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>