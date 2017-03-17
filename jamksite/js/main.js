var AUTH_CODES = [999, 123];

$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();

    $("#clientSearchSubmit").click(function(){

        // Radio-button choice between all|name|phone
        var clientSearchVal = $("input[type='radio'][name='clientSearchRadio']:checked").val();

        // Case-sensitive string input in textbox for client name filter
        var clientSearchFilterName = $("#client-name").val();

        // Case-sensitive string input in textbox for client phone number filter
        var clientSearchFilterPhone = $("#client-phone").val();

        //TODO GIVEN INPUTS, BUILD QUERY AND SEND TO DB

        $("#resultsTable").show();

    });

    $("#roomSearchSubmit").click(function(){

        // Radio-button choice between floor|roomNumber
        var roomSearchVal = $("input[type='radio'][name='roomSearchRadio']:checked").val();

        // Selected floor from drop-down. Default: "1"
        var roomFloorVal = $("#floorNumValue").val();

        // Inputed room number. No-entry: ""
        var roomNumVal = $("#roomNumValue").val();

        //TODO GIVEN INPUTS, BUILD QUERY AND SEND TO DB

        $("#resultsTable").show();

    });

    $("#clientRoomSearchSubmit").click(function(){

        // Returns array of all selected values from junior|deluxe|queen|premium
        var clientRoomSearchVals = [];
        $("input[type='checkbox'][name='clientRoomCheckbox']:checked").each(function(){
            clientRoomSearchVals.push($(this).val());
        });

        //TODO GIVEN INPUTS, BUILD QUERY AND SEND TO DB

        $("#resultsTable").show();

    });

    $("#manageDiscountsSubmit").click(function(){

        if (checkAuthCode()) {  // Manager authorization code is valid. Continue:

            // Radio-button choice between min|max
            var roomSearchVal = $("input[type='radio'][name='discountsRadio']:checked").val();

            //TODO GIVEN INPUTS, BUILD QUERY AND SEND TO DB

            $("#authError").hide();
            $("#resultsTable").show();

        } else { // Manager authorization code is invalid. Error message displayed. Do not continue.

            $("#authError").show();
            $("#resultsTable").hide();
        }
    });

    $("#manageRoomsSubmit").click(function(){

        if (checkAuthCode()) {  // Manager authorization code is valid. Continue:

            // Dropdown select of room type
            var roomTypeVal = $("#roomTypeValue").val();

            //TODO GIVEN INPUTS, BUILD QUERY AND SEND TO DB

            //TODO NOTE: If delete is succesful, call removeRoomType(<"junior"|"deluxe"|"queen"|"premium">) to remove room type from dropdown list
            // removeRoomType(roomType);

            $("#authError").hide();
            $("#resultsTable").show();

        } else {   // Manager authorization code is invalid. Error message displayed. Do not continue.

            $("#authError").show();
            $("#resultsTable").hide();
        }

    });

    $("#userCreateSubmit").click(function(){

        // TODO verification on all data
        var clientName = $("#client-name").val(); // String
        var startDate = $("#start-date").val(); // Date
        var endDate = $("#end-date").val(); // Date
        var numGuests = $("#num-guests").val(); // Number or String
        var clientPhone = $("#client-phone").val(); // String
        var ccNum = $("#cc-num").val(); // Number or String

        //TODO GIVEN INPUTS, BUILD QUERY, SEND TO DB, AND UPDATE RESULTS TABLE

        $("#resultsTable").show();
        
    });

    $("#userRetrieveSubmit").click(function(){

        var confNum = $("#conf-num").val();
        var ccNum = $("#cc-num").val();

        //TODO retrieve reservations from confNum and ccNum

        //TODO call populateInputFields(<name>, <startDate>, <endDate>, <numGuests>, <phoneNumber>) to fill in form
        //populateInputFields();
        populateInputFields(1,2,3,4,5); //test

    });

    $("#userModifySubmit").click(function(){

        // TODO verification on all data
        var newClientName = $("#client-name").val(); // String
        var newStartDate = $("#start-date").val(); // Date
        var newEndDate = $("#end-date").val(); // Date
        var newNumGuests = $("#num-guests").val(); // Number or String
        var newClientPhone = $("#client-phone").val(); // String

        //TODO GIVEN INPUTS, BUILD QUERY AND SEND TO DB TO UPDATE

        $("#resultsTable").show();

    });

    //===== For ManageRooms and ManageDiscounts =====

    // Grabs input in authorization code box and checks against array of accepted auth codes.
    function checkAuthCode() {
        var authCodeInput = $("#managerAuth").val();
        if (authCodeInput == "") {return false;}
        return (AUTH_CODES.some(x => x.toString() == authCodeInput));
    }

    // Given one of "junior"|"deluxe"|"queen"|"premium", remove option from manageRooms page drop-down
    function removeRoomType(roomType) {
        $("option[value='" + roomType + "']").remove();
    }

    //===== For userModify =====

    function populateInputFields(name, startDate, endDate, numGuests, phoneNumber){
        $("#client-name").val(name);
        $("#start-date").val(startDate);
        $("#end-date").val(endDate);
        $("#num-guests").val(numGuests);
        $("#client-phone").val(phoneNumber);
    }
});