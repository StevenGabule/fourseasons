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
        .btn-outline-blue.active {
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
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
@include('_shared._header')

<main class="container p-4 bg-white mt-5 shadow">
    <div class="text-center mb-5">
        <h3 class="text-capitalize">Tell us your current home</h3>
        <h6>We don't share your personal information with everyone</h6>
    </div>
    <!-- form that i think that encapsulate the two column so that the submit button worked -->
    <form action="{{ route('customer.booking') }}" method="post">
    @csrf
    <!-- Container for the two column -->
        <div class="row">
            <!-- First column container -->
            <div class="col-12 col-lg-8">

                <!-- div container for Step 1 -->
                <div class="mb-5">
                    <h5 class="text-capitalize">Follow the step to complete your booking information</h5>
                    <h6 class="mb-4 text-muted">View your price below and just a few details and we can complete your
                        booking
                        information</h6>

                    <h5>STEP 1 : WHO YOU ARE</h5>
                    <p class="text-muted">This information will be used to contact you about your service.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_fullName">Enter fullname<span class="text-danger" data-toggle="tooltip"
                                                                               data-placement="top"
                                                                               title="This field require for your booking information">*</span></label>
                                <input type="text" class="form-control" id="user_fullName" name="fullname">
                            </div>
                        </div><!-- end of fullname -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="user_email">Enter email<span class="text-danger" data-toggle="tooltip"
                                                                         data-placement="top"
                                                                         title="This field require for your booking information">*</span></label>
                                <input type="email" class="form-control" id="user_email" name="email">
                            </div>
                        </div><!-- end of email -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="user_phone">Enter phone number<span class="text-danger"
                                                                                data-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="This field require for your booking information">*</span></label>
                                <input type="text" class="form-control" id="user_phone" name="phone">
                            </div>
                        </div><!-- end of phone numbers -->

                        <div class="col-12 offset-md-6 col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="usr_check_reminders"
                                       name="reminders">
                                <label class="form-check-label" for="usr_check_reminders">Send me reminders about my
                                    booking via text message</label>
                            </div>
                        </div><!-- end of reminder for sending message -->
                    </div><!-- end of row -->
                </div>

                <!-- start of Step 2 -->
                <div>
                    <h5>STEP 2: YOUR HOME</h5>
                    <p class="text-muted">Where would you like us to clean?</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_address">Enter the current address<span class="text-danger"
                                                                                         data-toggle="tooltip"
                                                                                         data-placement="top"
                                                                                         title="This field require for your booking information">*</span></label>
                                <textarea rows="4" class="form-control" id="user_address" name="address"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_accurate_house_address">Enter house/apartment no.<span
                                        class="text-danger" data-toggle="tooltip" data-placement="top"
                                        title="This field require for your booking information">*</span></label>
                                <textarea rows="4" class="form-control" id="user_accurate_house_address"
                                          name="home_apartment_number"></textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="user_city">Enter city name<span class="text-danger" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            title="This field require for your booking information">*</span></label>
                                <input type="text" class="form-control" id="user_city">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="user_postcode">Enter Postal code<span class="text-danger"
                                                                                  data-toggle="tooltip"
                                                                                  data-placement="top"
                                                                                  title="This field require for your booking information">*</span></label>
                                <input type="email" class="form-control" id="user_postcode" name="postcode">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start of Step 3 -->
                <div class="mt-4">
                    <h5>STEP 3: CHOOSE SERVICE TYPE</h5>
                    <p class="text-muted">What type of service would you like?</p>

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
                        <select class="form-control" id="usr_choosen_service_type" name="service_type">
                            <option value="1">Regular</option>
                            <option value="2">Deep Clean</option>
                            <option value="3">End of Tenancy</option>
                        </select>
                    </div>
                </div>
                <!-- div container for Step 4 -->
                <div class="mt-5">
                    <h5>STEP 4: CHOOSE YOUR SERVICE</h5>
                    <p class="text-muted">Tell us about your home. Please round up any half bedrooms or bathrooms.
                        Included are your living
                        room, kitchen, hallways and other areas of the home.</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <select class="form-control" id="usr_number_of_bedroom" name="bedroom">
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
                                <select class="form-control" id="usr_number_of_bathroom" name="bathroom">
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

                <div class="mt-5">
                    <h5>STEP 5: SELECT EXTRA</h5>
                    <p class="text-muted">Adds extra time</p>
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
                                                   placeholder="Count" value="0" min="1" max="30" name="cabinet">

                                            <div class="input-group-append">

                                                <a id="extra_cabinet_btn_plus" data-cabinet="1" class="btn font-weight-bold"
                                                   type="button">+</a>

                                                <a id="extra_cabinet_btn_minus" data-cabinet="2" class="btn font-weight-bold"
                                                   type="button">-</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="px-1 pt-1">Clean inside cabinets (per cabinet)<span
                                    id="usr_extra_clean_cabinet_count"></span></p>
                        </div><!-- end of cabinet -->

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
                                                   placeholder="Count" value="0" min="1" max="30" name="inside_windows">

                                            <div class="input-group-append">
                                                <a id="extra_windows_btn_plus"
                                                   class="btn font-weight-bold"
                                                   type="button">+</a>
                                                <a id="extra_windows_btn_minus"
                                                   class="btn font-weight-bold"
                                                   type="button">-</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="px-1 pt-1">Clean inside windows (per window)<span
                                    id="usr_extra_clean_windows_count"></span></p>
                        </div> <!-- end of inside windows -->

                        <div id="usr_extra_clean_walls" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/wall.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1">Clean walls</p>
                            <p style="visibility: hidden;width:0;height:0;"><input type="checkbox" name="clean_walls"
                                                                                   id="extra_clean_walls"> Clean walls
                            </p>
                        </div><!-- end of walls -->

                        <div id="usr_extra_batch_laundry" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/washing-machine.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">One batch of laundry</p>
                            <p style="visibility: hidden;width:0;height:0;"><input type="checkbox" name="extra_laundry"
                                                                                   id="extra_laundry"> Clean walls</p>
                        </div><!-- end of laundry -->

                        <div id="usr_extra_clean_inside_oven" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/stove.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">Clean inside the oven</p>
                            <p style="visibility: hidden;width:0;height:0;">
                                <input type="checkbox"
                                       name="extra_clean_oven"
                                       id="extra_clean_oven"> Clean oven</p>

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
                            <p style="visibility: hidden;width:0;height:0;">
                                <input type="checkbox"
                                       name="extra_inside_fridge"
                                       id="extra_inside_fridge"> Clean inside the Fridge</p>

                        </div>

                        <div id="usr_extra_1hr_ironing" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/check-bold.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">One full hour of ironing</p>
                            <p style="visibility: hidden;width:0;height:0;"><input type="checkbox" name="extra_ironing"
                                                                                   id="extra_ironing"> hour of ironing
                            </p>
                        </div>

                        <div id="usr_extra_pets" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/dog.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">Home with Pets</p>
                            <p style="visibility: hidden;width:0;height:0;"><input type="checkbox" name="extra_animal"
                                                                                   id="extra_animal"> Home with Pets</p>
                        </div>

                        <div id="usr_extra_vac_mop_bucket" class="col-6 col-md-3 selection">
                            <div class="extra-header-container">
                                <div class="border rounded extra-image-container">
                                    <img class="extra-img m-auto" src="{{ asset('images/assets/check-bold.png') }}"
                                         alt="extra-image-cabinet">
                                </div>
                            </div>
                            <p class="px-1 pt-1">Provide Vacuum, Mop and Bucket</p>
                            <p style="visibility: hidden;width:0;height:0;"><input type="checkbox" name="extra_map"
                                                                                   id="extra_map"> Provide Vacuum, Mop
                                and Bucket</p>
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
                                                   placeholder="Count" value="0" min="1" max="30"
                                                   name="extra_bed_changing">

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

                <div class="mt-5">
                    <h5>Additional information</h5>
                    <p>How many floors is your home? *</p>
                    <div class="form-group">
                        <select class="form-control" id="usr_additional_info_about_4season">
                            <option value="Select here" disabled></option>
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
                    <p class="text-muted">Choose both a date and a 2 hour window between which you would like us to
                        come.</p>
                    <div class="row">
                        <div class="col-12 col-md-6 mt-2">
                            <input id="datepicker" type="text" placeholder="Choose Date*" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                            <select class="form-control" id="usr_hour_selection" disabled>
                                <option value="" disabled="">Select time arrival</option>
                                <option value="8:00AM - 9:AM">8:00AM - 9:AM</option>
                                <option value="9:00AM - 10:AM">9:00AM - 10:AM</option>
                                <option value="10:00AM - 11:AM">10:00AM - 11:AM</option>
                                <option value="11:00AM - 12:NN">11:00AM - 12:NN</option>
                                <option value="12:00NN - 1:PM">12:00NN - 1:PM</option>
                                <option value="1:00PM - 2:PM">1:00PM - 2:PM</option>
                                <option value="2:00PM - 3:PM">2:00PM - 3:PM</option>
                                <option value="3:00PM - 4:PM">3:00PM - 4:PM</option>
                                <option value="4:00PM - 5:PM">4:00PM - 5:PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h5>How often?</h5>
                        <p class="text-muted">It's all about matching you with the perfect clean for your home.
                            Scheduling
                            is flexible. Cancel
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
                </div>
            </div>  <!-- Second Column container -->

            <div class="col-12 col-lg-4 ">
                <div class="sticky">
                    <div class="border rounded booking-css">

                        <h5 class="mt-3 text-center font-weight-bolder py-2">BOOKING SUMMARY</h5>

                        <div class="py-4 px-4 d-flex flex-column border-bottom mb-3 border-top small">

                            <p class="d-flex align-items-center">
                                <i class="fas fa-2x fa-house-damage"></i>
                                <span class="ml-2" id="bedroom_request">1</span>&nbsp;
                                <span style="" id="booking_summary_bedroom"> Bedroom (Regular)</span>
                            </p>

                            <p class="d-flex align-items-center">
                                <i class="far fa-2x fa-calendar"></i>
                                <span class="ml-3" id="booking_summary_date">Choose service date...</span>
                                <span class="ml-3" id="booking_summary_time"></span>
                            </p>

                            <p class="d-flex align-items-center">
                                <i class="far fa-2x fa-clock"></i>
                                <span class="ml-3" id="booking_summary_totalTime"><span
                                        id="booking_summary_hours">2</span> Hours  <span
                                        id="booking_summary_minutes">0</span> Minutes</span>

                            </p>

                            <p class="d-flex align-items-center">
                                <i class="fas fa-2x fa-redo"></i>
                                <span class="ml-3" id="booking_summary_often">Biweekly</span>
                            </p>

                        </div>

                        <div class="px-4 d-flex justify-content-between small">
                            <p class="font-weight-bold mb-1">Subtotal</p>
                            <p id="booking_summary_subTotal" class="font-weight-bold mb-1">£42.00</p>
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
            <div class="col-12 col-lg-8 mt-3">
                <p class="text-muted">By clicking the PROCEED TO PAYMENT button you are agreeing to our Terms of
                    Service
                    and
                    Privacy Policy.</p>
                <button type="submit" class="btn btn-prim py-3 w-100">PROCEED TO PAYMENT</button>
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
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            minDate: today
        }).on('change', function () {
            $("#usr_hour_selection").attr("disabled", false);
            $("#booking_summary_time").text("8:00 AM - 9:00 AM")
        });

        $(document).on('change', '#usr_hour_selection', function () {
            $("#booking_summary_time").text(this.value)
        });

        let extra = 15;
        function extras(extraHours, extraHour, extraMinutes, extraMinute, update) {
            if (extraMinute === 0) {
                if (update === 1) {
                    extra = 15;
                    extraMinutes.text(extra);
                } else {
                    extraMinutes.text(0);
                    if (extraHour !== 2) {
                        extraHour--;
                        extraHours.text(extraHour);
                        extra = 45;
                        extraMinutes.text(extra);
                    }
                }
            } else {
                if (update === 1) {
                    extra += 15;
                    extraMinutes.text(extra);
                    if (extra === 60) {
                        extraHour++;
                        extraHours.text(extraHour);
                        extraMinutes.text(0);
                        extra = 15;
                    }
                } else {
                    extra -= 15;
                    extraMinutes.text(extra);
                }
            }
        }

        $(document).on('click', '#extra_cabinet_btn_plus, #extra_cabinet_btn_minus', function (e) {
            let extra_hours = $("#booking_summary_hours");
            let extra_hour = parseInt(extra_hours.text());
            let extra_minutes = $("#booking_summary_minutes");
            let extra_minute = parseInt(extra_minutes.text());
            extras(extra_hours, extra_hour, extra_minutes, extra_minute, parseInt(e.target.dataset.cabinet));
        });

    })
</script>
