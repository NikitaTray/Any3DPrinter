var page_height = $(window).height();
var page_width = $(window).width();

/*-----------Settings Page------------------*/
$frame = $('#smart');
$slidee = $frame.children('ul').eq(0);
$wrap = $frame.parent();

$frame.css({
    'height': page_height - 250
});
// $wrap.parent().height($wrap.parent().height() + page_height - 250 );


$('#addPrinter').on('click', function () {
    if ($('#allprinters').find('.save-item').length == 0) {
        var $item = '<li class="save-item">' + $('#last_item').html() + '</li>';
        $('#allprinters').prepend($item);
    }

    $('.btn-save').on('click', function () {
        $item = $(this).parent().parent().parent().parent().parent().parent();
        save_item($item);
    });
    $('.btn-edit').on('click', function () {
        if ($('#allprinters').find('.save-item').length == 0) {
            var $item = $(this).parent().parent().parent().parent().parent().parent();
            edit_item($item);
        }
    });
    $('.btn-cancel').on('click', function () {
        var $item = $(this).parent().parent().parent().parent().parent().parent();
        cancel_item($item, 1);

    });
    $('.btn-delete').on('click', function () {
        var $item = $(this).parent().parent().parent().parent().parent().parent();
        delete_item($item);
    });
});
$('.btn-save').on('click', function () {
    $item = $(this).parent().parent().parent().parent().parent().parent();
    save_item($item);
});
$('.btn-edit').on('click', function () {
    if ($('#allprinters').find('.save-item').length == 0) {
        var $item = $(this).parent().parent().parent().parent().parent().parent();
        edit_item($item);
    }

});
$('.btn-cancel').on('click', function () {
    var $item = $(this).parent().parent().parent().parent().parent().parent();
    cancel_item($item, 2);

});
$('.btn-delete').on('click', function () {
    var $item = $(this).parent().parent().parent().parent().parent().parent();
    delete_item($item);

});

function save_item($item) {
    var param = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        email: $item.find('.input-address').val(),
        password: $item.find('.input-password').val(),
        name: $item.find('.input-name').val(),
        type: $item.find('.input-type').val(),
    };
    if ($item.hasClass('edit-item')) { // update
        $.post("setting/update", param, function (result) {
            if (result === "YES" || result === "ReadOnly") {
                $item.find('.span-name').text($item.find('.input-name').val());
                $item.find('.span-type').text($item.find('.input-type').val());
                $item.find('.span-password').text($item.find('.input-password').val());
                $item.find('.span-address').text($item.find('.input-address').val());
                $item.removeClass('save-item');
            } else if (result === "NO") {
                alert("Cannot update the printer details.");
            } else if (result === "EMPTY") {
                alert("Please input all details.");
            }
        })
    } else { // add
        $.post("setting/add", param, function (result) {
            if (result === "YES" || result === "ReadOnly") {
                $item.find('.span-name').text($item.find('.input-name').val());
                $item.find('.span-type').text($item.find('.input-type').val());
                $item.find('.span-password').text($item.find('.input-password').val());
                $item.find('.span-address').text($item.find('.input-address').val());
                $item.removeClass('save-item');
            } else if (result === "NO") {
                alert("Invalid details.");
            } else if (result === "EMPTY") {
                alert("Please input all details.");
            }
        })
    }
}

function delete_item($item) {
    $('#myModal3').modal('show');
    $('#conf-yes').on('click', function () {
        var param = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            email: $item.find('.span-address').text(),
        };
        $.post("setting/delete", param, function (result) {
            if (result === "YES") {
                $item.remove();
            } else if (result === "NO") {
                alert("Cannot delete the printer.");
            } else if (result === "EMPTY") {
                alert("Please input all details.");
            }
        });
    });
    $('#conf-no').on('click', function () {
        $('#myModal3').modal('hide');
    });
}

function edit_item($item) {
    $item.find('.input-name').val($item.find('.span-name').text());
    $item.find('.input-type').val($item.find('.span-type').text());
    $item.find('.input-password').val($item.find('.span-password').text());
    $item.find('.input-address').val($item.find('.span-address').text());

    $item.addClass('save-item edit-item');
}

function cancel_item($item, mode) {
    if ($item.hasClass('edit-item')) {
        $item.removeClass('save-item edit-item');
    } else {
        if ($item.hasClass('save-item')) {
            $item.remove();
        }
    }
}

$("#download").on("click", function () {
    window.location = "download/overview";
});
