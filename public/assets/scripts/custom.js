$(document).ready(function () {
    // $('#pause').on('click', function () {
    //     if ($(this).text() == 'Pause') {
    //         $(this).text('Continue');
    //     } else {
    //         $(this).text('Pause');
    //     }
    // });
    // $('#head').on('click', function () {
    //     if ($(this).text() == 'Head ON') {
    //         $(this).text('Head OFF');
    //     } else {
    //         $(this).text('Head ON');
    //     }
    // });
    // $('#bed').on('click', function () {
    //     if ($(this).text() == 'Bed ON') {
    //         $(this).text('Bed OFF');
    //     } else {
    //         $(this).text('Bed ON');
    //     }
    // });

    $('#printerSidebar li').on('click', function () {
        $('#printerSidebar li').removeClass('active');
        $(this).addClass('active');
    })
});
//# sourceURL=pen.js
