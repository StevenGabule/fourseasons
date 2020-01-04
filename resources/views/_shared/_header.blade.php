<header class="header">

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">

        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/Logo/75380138_551833662028359_766816116633763840_n.png') }}" class="logo"
                     alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto small font-weight-bold">
                    <a class="nav-item nav-link text-blue" href="javascript:void(0)">How it Works</a>
                    <a class="nav-item nav-link text-blue" href="javascript:void(0)">Services</a>
                    <a class="nav-item nav-link text-blue" href="javascript:void(0)">Contact Us</a>
                    <a class="nav-item nav-link text-blue" href="javascript:void(0)">Why Us</a>
                </div>

                <div class="form-inline my-2 my-lg-0 small">
                    <a class="btn btn-outline-blue btn-sm my-2 my-sm-0 mr-2 active" href="{{ route('booking.customer') }}">Book Now</a>
                    <a class="btn btn-outline-blue btn-sm my-2 my-sm-0" href="javascript:void(0)">Call Us</a>
                </div>
            </div><!-- end of navbar links -->
        </div><!-- end of container -->
    </nav><!-- end of navigation -->
</header><!-- end of header -->
