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
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
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

        .btn-outline-blue:hover,
        .btn-outline-blue.active{
            background-color: #243774;
            color: #fff;
        }


        .bg-kitchen {
            background: url("{{ asset('images/assets/kitchen.jpg') }}") no-repeat;
            background-size: cover;
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

<main class="container p-4 bg-white mt-5 shadow">
    <div class="text-center mb-5">
        <h3 class="text-capitalize">Tell us your current home</h3>
        <h6>We don't share your personal information with everyone</h6>
    </div>
    <!-- form that i think that encapsulate the two column so that the submit button worked -->
    <form action="">
        <!-- Container for the two column -->
        <div class="row">
            <!-- First column container -->
            <div class="col-12 col-lg-8">

                <!-- div container for Step 1 -->
                <div class="mb-5">
                    <h5 class="text-capitalize">Complete your booking</h5>
                    <h6 class="mb-4">View your price below and just a few details and we can complete your booking
                        information</h6>

                    <h5>STEP 1 : Your Basic Information</h5>
                    <p>This information will be used to contact you about your service.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_fullName">Enter fullname<span class="text-danger" data-toggle="tooltip" data-placement="top" title="This field require for your booking information">*</span></label>
                                <input type="text" class="form-control" id="user_fullName">
                            </div>
                        </div><!-- end of fullname -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="user_email">Enter email<span class="text-danger" data-toggle="tooltip" data-placement="top" title="This field require for your booking information">*</span></label>
                                <input type="email" class="form-control" id="user_email">
                            </div>
                        </div><!-- end of email -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="user_phone">Enter phone number<span class="text-danger" data-toggle="tooltip" data-placement="top" title="This field require for your booking information">*</span></label>
                                <input type="text" class="form-control" id="user_phone">
                            </div>
                        </div><!-- end of phone numbers -->

                        <div class="col-12 offset-md-6 col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="usr_check_reminders">
                                <label class="form-check-label" for="usr_check_reminders">Send me reminders about my
                                    booking via text message</label>
                            </div>
                        </div><!-- end of reminder for sending message -->
                    </div><!-- end of row -->
                </div>

                <!-- start of Step 2 -->
                <div>
                    <h5>STEP 2: YOUR HOME</h5>
                    <p>Where would you like us to clean?</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_address">Enter the current address<span class="text-danger" data-toggle="tooltip" data-placement="top" title="This field require for your booking information">*</span></label>
                                <textarea rows="4" class="form-control" id="user_address" name="address"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_accurate_house_address">Enter house/apartment no.<span class="text-danger" data-toggle="tooltip" data-placement="top" title="This field require for your booking information">*</span></label>
                                <textarea rows="4" class="form-control" id="user_accurate_house_address"></textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="user_city">Enter city name<span class="text-danger" data-toggle="tooltip" data-placement="top" title="This field require for your booking information">*</span></label>
                                <input type="text" class="form-control" id="user_city">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="user_postcode">Enter Postal code<span class="text-danger" data-toggle="tooltip" data-placement="top" title="This field require for your booking information">*</span></label>
                                <input type="email" class="form-control" id="user_postcode">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start of Step 3 -->
                <div class="mt-4">
                    <h5>STEP 3: CHOOSE SERVICE TYPE</h5>
                    <p>What type of service would you like?</p>

                    <p><span class="font-weight-bold">Regular Clean: </span>This is our most popular clean and is more
                        of a maintenance clean where we focus on all reachable areas and surfaces of the home. We
                        recommend you book on a recurring basis to
                        keep your home clean and healthy!
                    </p>
                    <p><span class="font-weight-bold">Deep Clean: </span>Also known as a Spring clean - this takes
                        everything from our regular clean but we also focus on all unreachable areas of the home such as
                        corners, behind appliances, nooks and
                        crannies. Recommended for any home that hasn't been cleaned in 2-3 months.</p>
                    <p><span class="font-weight-bold">End of Tenancy Clean: </span>We recommend this for anyone moving
                        out or moving into their new home. It is our most rigorous cleaning and we won't leave until
                        your home is spotless. Your house must
                        be empty for this clean.</p>
                    <div class="form-group">
                        <select class="form-control" id="usr_choosen_service_type">
                            <option value="regular">Regular</option>
                            <option value="deepclean">Deep Clean</option>
                            <option value="tenancy">End of Tenancy</option>
                        </select>
                    </div>
                </div>
                <!-- div container for Step 4 -->
                <div>
                    <h5>STEP 4: CHOOSE YOUR SERVICE</h5>
                    <p>Tell us about your home. Please round up any half bedrooms or bathrooms. Included are your living
                        room, kitchen, hallways and other areas of the home.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <select class="form-control" id="usr_number_of_bedroom">
                                    <option value="1">1 Bedroom (Regular)</option>
                                    <option value="2">2 Bedroom (Regular)</option>
                                    <option value="3">3 Bedroom (Regular)</option>
                                    <option value="4">4 Bedroom (Regular)</option>
                                    <option value="5">5 Bedroom (Regular)</option>
                                    <option value="6">6 Bedroom (Regular)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <select class="form-control" id="usr_number_of_bathroom">
                                    <option value="1">1 Bathroom</option>
                                    <option value="2">2 Bathroom</option>
                                    <option value="3">3 Bathroom</option>
                                    <option value="4">4 Bathroom</option>
                                    <option value="5">5 Bathroom</option>
                                    <option value="6">6 Bathroom</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h5>STEP 5: SELECT EXTRA</h5>
                    <p>Adds extra time</p>
                    <div id="web_extra_container" class="row text-center">
                        <div id="usr_extra_clean_cabinet" class="col-6 col-md-3 selection-input">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/file-cabinet-1.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                                <div class="extra-input-cont">
                                    <div class="d-flex h-100">
                                        <div class="input-group my-auto">
                                            <input id="extra_cabinet_count" type="number" class="form-control"
                                                   placeholder="Count" value="0" min="1" max="1000">
                                            <div class="input-group-append">
                                                <a id="extra_cabinet_btn_plus" class="btn" type="button">+</a>
                                                <a id="extra_cabinet_btn_minus" class="btn" type="button">-</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="px-1 pt-1">Clean inside cabinets (per cabinet)<span
                                    id="usr_extra_clean_cabinet_count"></span></p>
                        </div>
                        <div id="usr_extra_clean_windows" class="col-6 col-md-3 selection-input">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto"
                                         src="{{ asset('images/assets/window-closed-variant.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                                <div class="extra-input-cont">
                                    <div class="d-flex h-100">
                                        <div class="input-group my-auto">
                                            <input id="extra_windows_count" type="number" class="form-control"
                                                   placeholder="Count" value="0" min="1" max="1000">
                                            <div class="input-group-append">
                                                <a id="extra_windows_btn_plus" class="btn" type="button">+</a>
                                                <a id="extra_windows_btn_minus" class="btn" type="button">-</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="px-1 pt-1">Clean inside windows (per window)<span
                                    id="usr_extra_clean_windows_count"></span></p>
                        </div>
                        <div id="usr_extra_clean_walls" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/wall.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1">Clean walls</p>
                        </div>
                        <div id="usr_extra_batch_laundry" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/washing-machine.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">One batch of laundry</p>
                        </div>
                        <div id="usr_extra_clean_inside_oven" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/stove.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">Clean inside the oven</p>
                        </div>
                        <div id="usr_extra_clean_fridge" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <!-- the image for ref is not included in the asset zip -->
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/file-cabinet-1.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">Clean inside the Fridge</p>
                        </div>
                        <div id="usr_extra_1hr_ironing" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/check-bold.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">One full hour of ironing</p>
                        </div>
                        <div id="usr_extra_pets" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/dog.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">Home with Pets</p>
                        </div>
                        <div id="usr_extra_vac_mop_bucket" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/check-bold.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">Provide Vacuum, Mop and Bucket</p>
                        </div>
                        <div id="usr_extra_bed_change" class="col-6 col-md-3 selection-input">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/bed-king.png') }}"
                                         alt="extra-image-cabinet ">
                                </div>
                                <div class="extra-input-cont">
                                    <div class="d-flex h-100">
                                        <div class="input-group my-auto">
                                            <input id="extra_bed_count" type="number" class="form-control"
                                                   placeholder="Count" value="0" min="1" max="1000">
                                            <div class="input-group-append">
                                                <a id="extra_bed_btn_plus" class="btn" type="button">+</a>
                                                <a id="extra_bed_btn_minus" class="btn" type="button">-</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="px-1 pt-1">Bed Changing (per bed)<span id="usr_extra_bed_counter"></span></p>
                        </div>
                    </div>
                </div>
                <div>
                    <h5>Additional information</h5>
                    <p>How did you hear about 4seasons?*</p>
                    <div class="form-group ">
                        <select class="form-control" id="usr_additional_info_about_4season">
                            <option value=" "></option>
                            <option value="google ">Google</option>
                            <option value="social media ">Social Media</option>
                            <option value="review sites ">Review Sites</option>
                            <option value="word of mouth ">Word of Mouth</option>
                            <option value="printed advertising ">Printed Advertising</option>
                            <option value="other ">Other</option>
                        </select>
                    </div>
                    <p>How many floors is your home? *</p>
                    <div class="form-group ">
                        <select class="form-control " id="usr_additional_info_about_4season ">
                            <option value=" "></option>
                            <option value="single floor ">Single floor</option>
                            <option value="two floors ">Two floors</option>
                            <option value="more than two floor ">More Than 2 floors</option>
                        </select>
                    </div>
                    <p>Do you have a mop and vacuum? (These are required for us to clean) *</p>
                    <div class="form-group ">
                        <select class="form-control " id="usr_question_have_mop_or_vacuum ">
                            <option value=" "></option>
                            <option value="single floor ">Yes</option>
                            <option value="two floors ">No (We are unable to book your clean)</option>
                        </select>
                    </div>
                    <p>What can we do to be the best cleaning service you've ever hired?</p>
                    <div class="form-group ">
                        <textarea class="form-control " id="usr_question_to_be_the_best "
                                  placeholder="What would make us the best cleaning service you 've hired (Not required)"
                                  rows="4"></textarea>
                    </div>
                </div>

                <!-- div that contain date picker and time for cleaning -->
                <div>
                    <h5>When would you like us to come?</h5>
                    <p>Choose both a date and a 2 hour window between which you would like us to come.</p>
                    <div class="row">
                        <div class="col-12 col-md-6 mt-2">
                            <input id="usr_date_selection" type="date" placeholder="Choose Date*" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                            <select class="form-control" id="usr_hour_selection">
                                <option value="">--:--</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <h5>How often?</h5>
                    <p>It's all about matching you with the perfect clean for your home. Scheduling is flexible. Cancel
                        or reschedule anytime.</p>
                    <div class="row no-gutters text-center radio-group">
                        <div class="col-12 col-md-3 pr-0">
                            <div data-value="One Time" class="border rounded mr-1 mt-2 radio">
                                <p class="m-3">One Time</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 pr-0">
                            <div data-value="Weekly" class="border rounded mr-1 mt-2 radio radioSelected">
                                <p class="m-3">Weekly</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 pr-0">
                            <div data-value="Biweekly" class="border rounded mr-1 mt-2 radio">
                                <p class="m-3">Biweekly</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 pr-0">
                            <div data-value="Monthly" class="border rounded mr-1 mt-2 radio">
                                <p class="m-3">Monthly</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- step 6 payment section div -->
                <div>
                    <h5>STEP 6: SELECT PAYMENT</h5>
                    <p>Enter your card information below.</p>
                    <div class="form-group">
                        <input type="email" class="form-control" id="usr_credit_number" placeholder="Credit Number">
                        <img class="py-3" src="{{ asset('images/assets/image.png') }}" alt="credit-image">
                    </div>
                </div>
            </div>
            <!-- Second Column container -->
            <div class="col-12 col-lg-4 ">
                <div class="sticky">
                    <div class="border rounded booking-css">

                        <h5 class="mt-3 text-center font-weight-bolder py-2">BOOKING SUMMARY</h5>

                        <div class="py-4 px-4 d-flex flex-column border-bottom mb-3 border-top small">
                            <p class="d-flex align-items-center">
                                <i class="fas fa-2x fa-house-damage"></i>
                                <span class="ml-2" style="" id="booking_summary_bedroom">1 Bedroom (Regular)</span>
                            </p>
                            <p class="d-flex align-items-center">
                                <i class="far fa-2x fa-calendar"></i>
                                <span class="ml-3" id="booking_summary_date">Choose service date...</span>
                            </p>
                            <p class="d-flex align-items-center">
                                <i class="far fa-2x fa-clock"></i>
                                <span class="ml-3" id="booking_summary_totalTime">3 Hours 0 Minutes</span>
                            </p>
                            <p class="d-flex align-items-center">
                                <i class="fas fa-2x fa-redo"></i>
                                <span class="ml-3" id="booking_summary_often">Biweekly</span>
                            </p>
                        </div>

                        <div class="px-4 d-flex justify-content-between small">
                            <p class="font-weight-bold mb-1">Subtotal</p>
                            <p id="booking_summary_subTotal" class="font-weight-bold mb-1">£46.00</p>
                        </div>

                        <div class="px-4 d-flex justify-content-between small">
                            <p class="font-weight-bold mb-1">Discount</p>
                            <p id="booking_summary_subTotal" class="font-weight-bold pb-0">£4.20</p>
                        </div>

                        <div class="px-4 pb-2 d-flex justify-content-between small">
                            <h4>Total</h4>
                            <h4 id="booking_summary_subTotal">£46.00</h4>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <br>
                <p>By clicking the Book Now button you are agreeing to our Terms of Service and Privacy Policy.</p>
                <button type="submit" class="btn btn-prim py-3 w-100">BOOK NOW</button>
            </div>
        </div>
    </form>
</main>
@include('_shared._footer')
<script src="{{ asset('js/booking.js') }}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

