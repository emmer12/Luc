// app.controller('EnumerationRequestController', function ($resource, $scope, $state, $window, $rootScope, $http) {
//     $window.scrollTo(0, 0);
//
// });

$(document).ready(function () {
    $('#preferredDateWidget').datetimepicker({
        format: 'd/m/Y',
        formatDate: 'd/m/Y',
        timepicker: false,
        closeOnDateSelect: true,
        minDate: 'now',
        onSelectDate: function (ct, $i) {
            $('#preferredDate').val(ct.dateFormat('d/m/Y'));
        }
    });

    $('#alternateDateWidget').datetimepicker({
        format: 'd/m/Y',
        formatDate: 'd/m/Y',
        timepicker: false,
        closeOnDateSelect: true,
        minDate: 'now',
        onSelectDate: function (ct, $i) {
            $('#alternateDate').val(ct.dateFormat('d/m/Y'));
        }
    });

    // $('#alternateDateWidget').datetimepicker({
    //     format: 'DD/MM/YYYY',
    //     minDate: 'now'
    // });
    // $('#preferredDateWidget').datetimepicker({
    //     format: 'DD/MM/YYYY',
    //     minDate: 'now'
    // });
});