
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="{{route('home')}}">{{env('APP_NAME')}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                        @if(auth()->check())
                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Welcome   @if(auth()->check()) --> {{auth()->user()->name}} @endif</h1>
                <p class="lead">A functional Bootstrap 5 boilerplate for one page scrolling websites</p>
                <a class="btn btn-lg btn-light" href="#about">Feeling Well</a>
            </div>
        </header>