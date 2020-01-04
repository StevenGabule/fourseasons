<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>FourSeasons Official Site</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,600&display=swap"
          rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: Montserrat, arial, serif;
            background-color: #F9F9FC;
        }

        .logo {
            width: 95px;
        }

        .header .navbar.navbar-expand-lg.navbar-light.bg-light {
            padding: 0;
            background-color: white !important;
        }

        .text-blue--text {
            color: #243774 !important;
        }

        a.text-blue {
            color: #243774 !important;
            -webkit-transition: all 200ms linear;
            -moz-transition: all 200ms linear;
            -ms-transition: all 200ms linear;
            -o-transition: all 200ms linear;
            transition: all 200ms linear;
        }

        a.text-blue:hover {
            color: #000 !important;
        }

        .btn-blue {
            background-color: #243774;
            color: white;
            border: 2px solid transparent
        }

        .btn-blue:hover {
            background-color: white;
            color: #243774;
            border: 2px solid #243774
        }

        .btn-outline-blue {
            border: 2px solid #243774;
            color: #243774;
            transition: all 200ms linear;
            font-weight: bold;
            width: 120px;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .btn-blue-appointment {
            background-color: #fff;
            color: #243774;
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
            width: 200px;
            padding: 10px;
            font-weight: bold;
            border: 2px solid transparent;
            transition: all 200ms;
        }

        .btn-blue-appointment.active,
        .btn-outline-blue.active {
            background-color: #243774;
            color: #fff;
        }

        .btn-blue-appointment:hover {
            background-color: #243774;
            color: #fff;
        }

        .btn-outline-blue:hover {
            background-color: #243774;
            color: #fff;
        }

        .hero {
            max-height: 80vh;
            background: url("{{ asset('images/hero/brown-wooden-center-table-584399.jpg') }}") no-repeat;
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
        }

        .cus-vh-50 {
            min-height: 70vh;
        }

        .cus-vh-80 {
            min-height: 80vh;
        }

        .bg-wallpaper {

            height: 80vh;
        }

        .bg-kitchen {
            background: url("{{ asset('images/assets/kitchen.jpg') }}") no-repeat;
            background-size: cover;
        }

        .bg-bathroom {
            background: url("{{ asset('images/assets/bathroom.jpg') }}") no-repeat;
            background-size: cover;
        }

        .bg-living {
            background: url("{{ asset('images/assets/living.jpg') }}") no-repeat;
            background-size: cover;
        }

        .bg-bedroom {
            background: url("{{ asset('images/assets/bedroom.jpg') }}") no-repeat;
            background-size: cover;
        }

        .bg-blue {
            color: white;
            background-color: #243774;

            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 2rem;
            padding-left: 50px;
        }

        .bg-footer {
            color: white;
            background-color: #243774;
        }

        ul.list-custom li {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
@include('_shared._header')

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="" style="margin-top: 20%;">
                    <h1 class="font-weight-bolder text-white">FIND YOUR <br>DOMESTIC HELPERS <br> IN SIMPLE STEPS</h1>
                    <p class="text-white">Book with us and we will ensure you have safe,<br>
                        secure and responsible manpower.</p>
                </div>
            </div>
            <div class="col-4 bg-white shadow-lg" style="margin-top: 100px;">
                <div class="p-3">
                    <h5 class="h5 text-blue--text pb-2">The easy, reliable way to take care of your home.</h5>
                    <p class="text-blue--text">Book a domestic cleaner instantly below.</p>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" id="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Current Email" id="email">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Current phone number" id="phoneNumber">
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="service_type" name="service_type">
                                <option value="">Select the category</option>
                                <option value="1">Regular</option>
                                <option value="2">Deep Clean</option>
                                <option value="3">End of Tenancy</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="bedrooms" name="bedrooms">
                                <option value="">Select number of bedrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="bathrooms" name="bathrooms">
                                <option value="">Select number of Bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitBooking" class="btn btn-block btn-blue font-weight-bold py-3">
                                Get A Price
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-6 mt-5 text-blue--text">How 4SeasonsCleaning Works</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">Tell us about your home</h5>
                        <p class="card-text text-muted">We’ll give you a price based on the size of your home.</p>
                    </div>
                </div>

                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">Choose an Available Time &amp; Date</h5>
                        <p class="card-text text-muted">Your cleaner can visit at the same time every week or
                            fortnight.</p>
                    </div>
                </div>

                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">Customise your clean</h5>
                        <p class="card-text text-muted">Add extra instructions for your cleaner in your online
                            account.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">Confirm your clean</h5>
                        <p class="card-text text-muted">We’ll take payment from your card after your clean is
                            complete.</p>
                    </div>
                </div><!-- end of card -->
            </div><!-- end of d-flex card -->
        </div>


        <div class="col-12">
            <div class="pt-md-4 pb-md-4 mx-auto text-center">
                <h5 class="mt-5 font-weight-bolder text-blue--text">Why choose 4SeasonsCleaning?</h5>
            </div>

            <div class="d-flex justify-content-center">
                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">We have designed the simplest booking system</h5>
                        <p class="card-text text-muted">Our team has spent hours working to offer you a seamless
                            experience for booking our cleaning services in London. We have designed our website with
                            you in mind. Just choose the bedrooms and bathrooms your property, choose the frequency and
                            tell us your address. It has never been so easy to book quality house cleaners!</p>
                    </div>
                </div>

                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">All our prices are flat and transparent for your
                            ease</h5>
                        <p class="card-text text-muted">We have made all of our prices completely transparent. You no
                            longer have to annoying wait for a call or email back on your quote request, just choose the
                            bedrooms and bathrooms and you can check how much your cleaning will cost.</p>
                    </div>
                </div>

                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">We cover the whole of London and live locally</h5>
                        <p class="card-text text-muted">Part of what makes our service in London so reliable is that
                            every cleaner we send is local to the area you live in. We won’t send you someone from
                            Greenwich if you live in Ealing. This is what is so unique to our booking system- we match
                            members of our cleaning team based on the areas they live in. You’ll never have last minute
                            cancellations again!</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm w-50">
                    <div class="card-body">
                        <h5 class="card-title text-blue--text">We care about your privacy and safety</h5>
                        <p class="card-text text-muted">We value your privacy and have a strict privacy policy to make
                            sure that your details are kept safe. You'll also find that our hiring policy is very
                            rigorous. We always vet and perform background checks on anyone joining the Glimmr
                            family.</p>
                    </div>
                </div><!-- end of card -->
            </div><!-- end of d-flex card -->
            <div class="d-flex justify-content-center pt-md-5 pb-md-5">
                <a href="javascript:void(0)" class="btn btn-blue-appointment my-2 my-sm-0 mr-2">Book Now</a>
                <a href="javascript:void(0)" class="btn btn-blue-appointment active my-2 my-sm-0 mr-2">Call Now</a>
            </div>
        </div><!-- end of col-12 -->
    </div><!-- end of row -->

</div><!-- end of container -->

<div class="container-fluid border-top border-bottom">

    <div class="row">

        <div class="col-12 cus-vh-50 text-center d-flex flex-column justify-content-center">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-blue--text text-capitalize">We Find Professional cleaners</h2>
                        <p class="text-muted">We know inviting someone into your home is a big deal. All our domestic
                            cleaners are
                            carefully vetted so we choose the right person to care for your home.</p>
                        <p class="text-muted">We guarantee that your domestic cleaner will always be:</p>
                    </div><!-- end of col-12 -->
                </div><!-- end of row -->
            </div><!-- end of inner container -->

            <div class="d-flex justify-content-center">
                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <div class="pb-4"><i class="fab fa-4x fa-creative-commons-by"></i></div>
                        <h5 class="card-title text-blue--text">Experienced & professional</h5>
                    </div>
                </div><!-- end of card -->

                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <div class="pb-4"><i class="far fa-4x fa-laugh"></i></div>
                        <h5 class="card-title text-blue--text">English speaking</h5>
                    </div>
                </div><!-- end of card -->

                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <div class="pb-4"><i class="fas fa-4x fa-indent"></i></div>
                        <h5 class="card-title text-blue--text">Background & reference checked</h5>
                    </div>
                </div><!-- end of card -->

                <div class="card mr-2 border-0 shadow-sm w-50">
                    <div class="card-body">
                        <div class="pb-4"><i class="fas fa-4x fa-american-sign-language-interpreting"></i></div>
                        <h5 class="card-title text-blue--text">Interviewed in-person</h5>
                    </div>
                </div><!-- end of card -->

                <div class="card border-0 shadow-sm w-50">
                    <div class="card-body">
                        <div class="pb-4"><i class="fab fa-4x fa-jenkins"></i></div>
                        <h5 class="card-title text-blue--text">Highly rated by other Customers</h5>
                    </div>
                </div><!-- end of card -->
            </div><!-- end of d-flex card -->
        </div><!-- end of col-12 with cus-vh-50 -->
    </div><!-- end of row -->
</div><!-- end of container-fluid -->

<div class="pricing-header px-3 pt-md-4 pb-md-4 mx-auto text-center">
    <h1 class="text-blue--text">What's include in a clean?</h1>
</div>

<div class="container-fluid cus-vh-80">
    <div class="row">
        <div class="col-6 bg-wallpaper bg-bedroom"></div>
        <div class="col-6 bg-blue">
            <h4 class="pb-md-3">Bedrooms</h4>
            <ul class="list-unstyled list-custom">
                <li><i class="fas fa-check mr-2"></i> Dust and wipe all accessible surfaces</li>
                <li><i class="fas fa-check mr-2"></i> Wipe switches and handles</li>
                <li><i class="fas fa-check mr-2"></i> Clean mirrors</li>
                <li><i class="fas fa-check mr-2"></i> Make the bed (leave fresh linen out if you would like us to
                    change)
                </li>
                <li><i class="fas fa-check mr-2"></i> Vacuum and mop floors</li>
            </ul>
        </div>
    </div><!-- end of row -->

    <div class="row">
        <div class="col-6 bg-blue">
            <h4 class="pb-md-3">Living room & common areas</h4>
            <ul class="list-unstyled list-custom">
                <li><i class="fas fa-check mr-2"></i> Dust and wipe all accessible surfaces</li>
                <li><i class="fas fa-check mr-2"></i> Wipe switches and handles</li>
                <li><i class="fas fa-check mr-2"></i> Clean mirrors</li>
                <li><i class="fas fa-check mr-2"></i> Empty rubbish bins</li>
                <li><i class="fas fa-check mr-2"></i> Vacuum and mop floors</li>
            </ul>
        </div><!-- end of col-5 -->
        <div class="col-6 bg-wallpaper bg-living"></div>
    </div><!-- end of row -->

    <div class="row">
        <div class="col-6 bg-wallpaper bg-bathroom"></div>
        <div class="col-6 bg-blue">
            <h4 class="pb-md-3">Bathroom</h4>
            <ul class="list-unstyled list-custom">
                <li><i class="fas fa-check mr-2"></i> Clean the toilet</li>
                <li><i class="fas fa-check mr-2"></i> Scrub shower, bath and sink</li>
                <li><i class="fas fa-check mr-2"></i> Clean cabinet exteriors, mirrors and fixtures</li>
                <li><i class="fas fa-check mr-2"></i> Wipe switches and handles</li>
                <li><i class="fas fa-check mr-2"></i> Empty rubbish bins</li>
                <li><i class="fas fa-check mr-2"></i> Vacuum and mop floors</li>
            </ul>
        </div>
    </div><!-- end of row -->

    <div class="row">
        <div class="col-6 bg-blue">
            <h4 class="pb-md-3">Kitchen</h4>
            <ul class="list-unstyled list-custom">
                <li><i class="fas fa-check mr-2"></i> Wash dishes or load dishwasher</li>
                <li><i class="fas fa-check mr-2"></i> Dust and wipe all accessible surfaces</li>
                <li><i class="fas fa-check mr-2"></i> Wipe exterior of kitchen cupboards, oven and fridge</li>
                <li><i class="fas fa-check mr-2"></i> Clean microwave interior and exterior</li>
                <li><i class="fas fa-check mr-2"></i> Wipe switches and handles</li>
                <li><i class="fas fa-check mr-2"></i> Scrub the hob</li>
                <li><i class="fas fa-check mr-2"></i> Wipe counter tops</li>
                <li><i class="fas fa-check mr-2"></i> Clean the sink</li>
                <li><i class="fas fa-check mr-2"></i> Put away clean dishes</li>
                <li><i class="fas fa-check mr-2"></i> Take out rubbish and recycling</li>
                <li><i class="fas fa-check mr-2"></i> Vacuum and mop floors</li>
            </ul>
        </div><!-- end of col-5 -->
        <div class="col-6 bg-wallpaper bg-kitchen"></div>

    </div><!-- end of row -->
</div><!-- end of container-fluid -->

<div class="container mt-md-5">
    <div class="row">
        <div class="col-6">
            <h4 class="pb-3 text-blue--text">Extra services</h4>
            <ul class="list-unstyled d-flex  justify-content-between">
                <li>
                    <div class="d-flex flex-column text-center">
                        <img alt="triangle with equal sides" src="{{ asset('images/svg/iron-svgrepo-com.svg') }}"
                             height="60" width="90">
                        <span class="small pt-3 text-muted">Ironing</span>
                    </div>
                </li>

                <li>
                    <div class="d-flex  flex-column text-center">
                        <img alt="triangle with equal sides"
                             src="{{ asset('images/svg/washing-machine-for-laundry-svgrepo-com.svg') }}" height="60"
                             width="90">
                        <span class="small pt-3 text-muted">Laundry</span>
                    </div>
                </li>

                <li>
                    <div class="d-flex  flex-column text-center">
                        <img alt="triangle with equal sides" src="{{ asset('images/svg/spray-svgrepo-com.svg') }}"
                             height="60" width="90">
                        <span class="small pt-3 text-muted">Spray windows</span>
                    </div>
                </li>

                <li>
                    <div class="d-flex  flex-column text-center">
                        <img alt="triangle with equal sides" src="{{ asset('images/svg/fridge-svgrepo-com.svg') }}"
                             height="60" width="90">
                        <span class="small pt-3 text-muted">Clean fridge</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex flex-column text-center">
                        <img alt="triangle with equal sides" src="{{ asset('images/svg/oven-svgrepo-com.svg') }}"
                             height="60" width="90">
                        <span class="small pt-3 text-muted">Clean oven</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-6">
            <h4 class="pb-3 text-blue--text">Customize Booking</h4>
            <p class=" text-muted">Customise your clean by adding instructions in your online account. They are sent directly to your cleaner's mobile app, ready for the clean.</p>
        </div>

    </div><!-- end of row -->
    <div class="d-flex justify-content-center pt-md-5 pb-md-5">
        <a href="javascript:void(0)" class="btn btn-blue-appointment my-2 my-sm-0 mr-2">Book Now</a>
        <a href="javascript:void(0)" class="btn btn-blue-appointment active my-2 my-sm-0 mr-2">Call Now</a>
    </div>
</div><!-- end of container -->

@include('_shared._footer')
