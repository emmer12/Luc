/**
 * Created by Gibah on 2/5/2018.
 */

$(document).ready(function () {

    $("form#createAgentForm").on("submit", function (event) {
        event.preventDefault();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var email = $('#email').val();
        // var password = $('#password').val();
        // var languageId = $('#languageId').val();
        var phoneNumber = $('#phoneNumber').val();
        // var username = $('#username').val();
        var gender = $('#gender').val();
        var role = $('#role').val();

        var data = {
            firstName: firstName,
            lastName: lastName,
            email: email,
            phoneNumber: phoneNumber,
            gender: gender,
            role: role
        };
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '/api/users/create',
            dataType: 'json',
            data: data,
            beforeSend: function () {

            },
            success: function (response) {

            },
            error: function (response) {

            }
        });
    });

    $("#createAgent").on("click", function (event) {
        $("form#createAgentForm").submit();
    });
});