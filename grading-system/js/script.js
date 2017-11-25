// Add Record
function addRecord() {
    // get values
    var last_name = $("#last_name").val();
    var first_name = $("#first_name").val();
    var mi = $("#mi").val();
    var first = $("#first").val();
    var second = $("#second").val();
    var third = $("#third").val();
    var fourth = $("#fourth").val();
    var final = $("#finalGrade").val();

    // Add record
    $.post("ajax/addRecord.php", {
        last_name: last_name,
        first_name: first_name,
        mi: mi,
        first: first,
        second: second,
        third: third,
        fourth: fourth,
        final: final
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#last_name").val("");
        $("#first_name").val("");
        $("#mi").val("");
        $("#first").val("");
        $("#second").val("");
        $("#third").val("");
        $("#fourth").val("");
        $("#finalGrade").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
function displayRecords() {
    $.get("ajax/displayRecords.php", {}, function (data, status) {
        $(".display_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete this data?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var student = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_last_name").val(student.Lastname);
            $("#update_first_name").val(student.Firstname);
            $("#update_mi").val(student.MI);
            $("#update_first").val(student.first);
            $("#update_second").val(student.second);
            $("#update_third").val(student.third);
            $("#update_fourth").val(student.fourth);
            $("#update_finalGrade").val(student.Final);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var midname = $("#update_mi").val();
    var updfirst = $("#update_first").val();
    var updsecond = $("#update_second").val();
    var updthird = $("#update_third").val();
    var updfourth = $("#update_fourth").val();
    var updfinal = $("#update_finalGrade").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            first_name: first_name,
            last_name: last_name,
            midname: midname,
            updfirst: updfirst,
            updsecond: updsecond,
            updthird: updthird,
            updfourth: updfourth,
            updfinal: updfinal
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
    displayRecords();
});