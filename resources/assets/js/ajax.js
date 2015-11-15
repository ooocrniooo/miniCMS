var submitDepartureRequest = function(e) {
    var form = $(this);
    var method = form.attr('method') || 'POST';
    var button=$(this).find('button[type="submit"]');
    var buttonOriginal=button.html();

    console.log("serialize:"+form.serialize());

    $.ajax({
        type: method,
        url: form.attr('action'),
        data: form.serialize(),
        success: function (data) {

            $(".append_msg").css('display', 'block');
                $(".append_msg").delay(2000).fadeOut(500, function () {
                    $(".append_msg").css('display',  'none');
                });

            console.log('SUCCESS Departure');
        },
        error: function (data) {
            $('.append_msg').html('' +
                '<h2>Error</h2>'
            );
            console.log('ERROR');
        }
    });

    e.preventDefault();
};

var submitArrivalRequest = function(e) {
    var form = $(this);
    var method = form.attr('method') || 'POST';
    var button=$(this).find('button[type="submit"]');
    var buttonOriginal=button.html();

    console.log("serialize:"+form.serialize());

    $.ajax({
        type: method,
        url: form.attr('action'),
        data: form.serialize(),
        success: function (data) {

            $(".append_msg").css('display', 'block');
                $(".append_msg").delay(2000).fadeOut(500, function () {
                    $(".append_msg").css('display', 'none');
                });

            console.log('SUCCESS Arrival');
        },
        error: function (data) {
            $('#append_msg').html('' +
                '<h2>Error</h2>'
            );
            console.log('ERROR');
        }
    });

    e.preventDefault();
};

$('form[flightarrivall-add]').on('submit', submitArrivalRequest);
$('form[flightdeparture-add]').on('submit', submitDepartureRequest);