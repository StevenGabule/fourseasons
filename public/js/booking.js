// function that handle emptying the choose bedroom dropdown and repopulating with updated list of options
function replaceServiceBedroomCount(elemId, serviceType) {
    var elementID = '#' + elemId;
    $(elementID).empty();
    $.each(CustomerService(serviceType), function (val, text) {
        $(elementID).append(new Option(text, val));
    });
}

//function that handle array of bedroom changes
function CustomerService(serviceType) {
    return {
        1: '1 Bedroom (' + serviceType + ')',
        2: '2 Bedrooms (' + serviceType + ')',
        3: '3 Bedrooms (' + serviceType + ')',
        4: '4 Bedrooms (' + serviceType + ')',
        5: '5 Bedrooms (' + serviceType + ')',
        6: '6 Bedrooms (' + serviceType + ')'
    };
}


//function that add class is selected and check if it is not zero
function addIsSelected(elemId, value) {
    if (value >= 1 && value <= 1000) {
        elemId.addClass('isSelected');
    } else {
        elemId.removeClass('isSelected');
    }
}

//function for input add and minus
function extraMinus(elInputID, elCounter, elemHeader) {
    var numberValue = parseInt(elInputID.val(), 10);
    var result = 0;
    if (numberValue <= 1000 && numberValue != 0) {
        result = numberValue - 1;
        elInputID.val(result);
        if (result != 0) {
            elCounter.text('(' + result + ')');
        } else {
            elCounter.text('');
        }

    } else if (numberValue == 0) {
        elInputID.val(0);
        elCounter.text('');
    } else {
        elInputID.val(0);
        elCounter.text('');
    }
    addIsSelected(elemHeader, result);
}

function extraAdd(elInputID, elCounter, elemHeader) {
    var numberValue = parseInt(elInputID.val(), 10);
    var result = 0;
    if (numberValue <= 1000) {
        result = numberValue + 1;
        elInputID.val(result);
        elCounter.text('(' + result + ')');
    } else {
        elInputID.val(0);
        elCounter.text('');
    }
    addIsSelected(elemHeader, result);
}

function extraChecker(elInputID, elCounter, elemHeader) {
    var numberValue = parseInt(elInputID.val(), 10);
    if (numberValue <= 1000 && numberValue >= 1) {
        elInputID.val(numberValue);
        elCounter.text('(' + numberValue + ')');
    } else if (numberValue > 1000) {
        numberValue = 0;
        elInputID.val(0);
        elCounter.text('');
    } else if (numberValue <= 0) {
        elInputID.val(0);
        elCounter.text('');
    }
    addIsSelected(elemHeader, numberValue);
}

function resetInputValues(elInputID, elCounter) {
    elInputID.val(0);
    elCounter.text('');
}

$(document).ready(function () {
    //chaching extra variables
    var exCabinet = $('#usr_extra_clean_cabinet');
    var exWindows = $('#usr_extra_clean_windows');
    var exWalls = $('#usr_extra_clean_walls');
    var exLaundry = $('#usr_extra_batch_laundry');
    var exOven = $('#usr_extra_clean_inside_oven');
    var exFridge = $('#usr_extra_clean_fridge');
    var exIroning = $('#usr_extra_1hr_ironing');
    var exPets = $('#usr_extra_pets');
    var exVac = $('#usr_extra_vac_mop_bucket');
    var exBed = $('#usr_extra_bed_change');

    //for the showing of image or input in extra
    var exSelectionInput = $('div.selection-input');
    var exImageCont = $('div.extra-image-container');
    var exInputCont = $('div.extra-input-cont');

    //extra Cabinet variables
    var exCabInput = $('#extra_cabinet_count');
    var exCabBtnPlus = $('#extra_cabinet_btn_plus');
    var exCabBtnMinus = $('#extra_cabinet_btn_minus');
    var exCabCounter = $('#usr_extra_clean_cabinet_count');

    //extra windows variables
    var exWinInput = $('#extra_windows_count');
    var exWinBtnPlus = $('#extra_windows_btn_plus');
    var exWinBtnMinus = $('#extra_windows_btn_minus');
    var exWinCounter = $('#usr_extra_clean_windows_count');

    //extra bed variables
    var exBedInput = $('#extra_bed_count');
    var exBedBtnPlus = $('#extra_bed_btn_plus');
    var exBedBtnMinus = $('#extra_bed_btn_minus');
    var exBedCounter = $('#usr_extra_bed_counter');

    exWalls.on('click', function() {
        var _check = $("#extra_clean_walls");
        if (_check.is(':checked')) {
            _check.attr('checked', false);
        }  else {
            _check.attr('checked','checked');
        }
    });

    exLaundry.on('click', function() {
        var _check = $("#extra_laundry");
        if (_check.is(':checked')) {
            _check.attr('checked', false);
        }  else {
            _check.attr('checked','checked');
        }
    });

    exOven.on('click', function() {
        var _check = $("#extra_clean_oven");
        if (_check.is(':checked')) {
            _check.attr('checked', false);
        }  else {
            _check.attr('checked','checked');
        }
    });

    exFridge.on('click', function() {
        var _check = $("#extra_inside_fridge");
        if (_check.is(':checked')) {
            _check.attr('checked', false);
        }  else {
            _check.attr('checked','checked');
        }
    });

    exIroning.on('click', function() {
        var _check = $("#extra_ironing");
        if (_check.is(':checked')) {
            _check.attr('checked', false);
        }  else {
            _check.attr('checked','checked');
        }
    });
    exPets.on('click', function() {
        var _check = $("#extra_animal");
        if (_check.is(':checked')) {
            _check.attr('checked', false);
        }  else {
            _check.attr('checked','checked');
        }
    });

    exVac.on('click', function() {
        var _check = $("#extra_map");
        if (_check.is(':checked')) {
            _check.attr('checked', false);
        }  else {
            _check.attr('checked','checked');
        }
    });

    var serviceTypeValue = 1;
    $("#usr_number_of_bedroom").on('change', function() {
       $('#bedroom_request').text($(this).val());
        if ($(this).val() > 1) {
            if (serviceTypeValue === 1)
                $("#booking_summary_bedroom").text('Bedrooms (Regular)');
            if (serviceTypeValue === 2)
                $("#booking_summary_bedroom").text('Bedrooms (Deep Clean)');
            if (serviceTypeValue === 3)
                $("#booking_summary_bedroom").text('Bedrooms (End of Tenancy)');
        }
    });

    $("#datepicker").on('mouseleave, mouseenter, change', function() {
        $("#booking_summary_date").text($(this).val() !== '' ? $(this).val() : 'Choose service date...')
    });

    // change based on service type
    $('#usr_choosen_service_type').on('change', function () {
        serviceTypeValue = $(this).val();
        if (parseInt(serviceTypeValue) === 1) {
            // to show all extra html element
            exCabinet.show();
            exWindows.show();
            exWalls.show();
            exLaundry.show();
            exOven.show();
            exFridge.show();
            exIroning.show();
            exPets.show();
            exVac.show();
            exBed.show();

            //change choose services string based on service type
            replaceServiceBedroomCount('usr_number_of_bedroom', 'Regular');

            $("#booking_summary_bedroom").text('Bedroom (Regular)');
            $('#bedroom_request').text(1);

        } else if (parseInt(serviceTypeValue) === 2) {
            exCabinet.show();
            exWindows.hide().removeClass('isSelected');
            resetInputValues(exCabInput, exCabCounter);
            exWalls.hide().removeClass('isSelected');
            exLaundry.show();
            exOven.hide().removeClass('isSelected');
            exFridge.hide().removeClass('isSelected');
            exIroning.hide().removeClass('isSelected');
            //change choose services string based on service type
            replaceServiceBedroomCount('usr_number_of_bedroom', 'Deep Clean');
            $("#booking_summary_bedroom").text('Bedroom (Deep Clean)');
            $('#bedroom_request').text(1);

        } else {
            exCabinet.hide().removeClass('isSelected');
            resetInputValues(exCabInput, exCabCounter);

            exWindows.hide().removeClass('isSelected');
            resetInputValues(exWinInput, exWinCounter);
            exWalls.hide().removeClass('isSelected');
            exLaundry.hide().removeClass('isSelected');
            exOven.hide().removeClass('isSelected');
            exFridge.hide().removeClass('isSelected');
            exIroning.hide().removeClass('isSelected');
            //change choose services string based on service type
            replaceServiceBedroomCount('usr_number_of_bedroom', 'End of Tenancy');
            $("#booking_summary_bedroom").text('Bedroom (End of Tenancy)');
            $('#bedroom_request').text(1);

        }
    });

    //all the extra that accept input to show and hide
    exSelectionInput.on('click', function () {
        exImageCont.show();
        exInputCont.hide();
        $(this).find(exImageCont).hide();
        $(this).find(exInputCont).show()
    });

    //so that show and hide input when clicking outside
    $(document).on('click', function (event) {
        if (!$(event.target).closest(exSelectionInput).length) {
            $(this).find(exImageCont).show();
            $(this).find(exInputCont).hide();
        }
    });


    //Cabinet Input add And minus section
    exCabBtnPlus.on('click', function () {
        //the excabcounter is for the tittle changing event
        extraAdd(exCabInput, exCabCounter, exCabinet);
    });

    exCabBtnMinus.on('click', function () {
        //the excabcounter is for the tittle changing event
        extraMinus(exCabInput, exCabCounter, exCabinet);
    });
    exCabInput.on('change', function () {
        //the excabcounter is for the tittle changing event
        extraChecker(exCabInput, exCabCounter, exCabinet);
    });

    //Window Input add And minus section
    exWinBtnPlus.on('click', function () {
        //the excabcounter is for the tittle changing event
        extraAdd(exWinInput, exWinCounter, exWindows);
    });
    exWinBtnMinus.on('click', function () {
        //the excabcounter is for the tittle changing event
        extraMinus(exWinInput, exWinCounter, exWindows);
    });
    exWinInput.on('change', function () {
        //the excabcounter is for the tittle changing event
        extraChecker(exWinInput, exWinCounter, exWindows);
    });

    //Bed Input add And minus section
    exBedBtnPlus.on('click', function () {
        //the excabcounter is for the tittle changing event
        extraAdd(exBedInput, exBedCounter, exBed);
    });
    exBedBtnMinus.on('click', function () {
        //the excabcounter is for the tittle changing event
        extraMinus(exBedInput, exBedCounter, exBed);
    });
    exBedInput.on('change', function () {
        //the excabcounter is for the tittle changing event
        extraChecker(exBedInput, exBedCounter, exBed);
    });

    //How often section radio like behavior
    $('.radio-group .radio').on('click', function () {
        $('div.radio-group').find('div.radio').removeClass('radioSelected');
        $(this).addClass('radioSelected');
        let val = $(this).attr('data-value');
        $("#booking_summary_often").text(val);
    });

    //icon filter check if selected
    $('div.selection').on('click', function () {
        $(this).toggleClass('isSelected');
    });

});
