function ajaxError(jqXHR, textStatus, errorThrown) {

    if (jqXHR.status === 0) {

        alert('Not connect: Verify Network.');

    } else if (jqXHR.status == 404) {

        alert('Requested page not found [404]');

    } else if (jqXHR.status == 500) {

        alert('Internal Server Error [500].');

    } else if (textStatus === 'parsererror') {

        alert('Requested JSON parse failed.');

    } else if (textStatus === 'timeout') {

        alert('Time out error.');

    } else if (textStatus === 'abort') {

        alert('Ajax request aborted.');

    } else {

        alert('Uncaught Error: ' + jqXHR.responseText);

    }

}


const server = "https://recorridos.gruporobles.com.pe/admin-360/";

function loadingUI(message, color) {
    $.blockUI({
        baseZ: 2000,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: color,
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            //opacity                  : 0.5,
            color: '#003465',
            //width                    : '40em'

        },
        message: '<h2><img style="margin-right: 30px" src="' + server + 'images/ajax-loader.gif" >' + message + '</h2>'
    });
}

function responseUI(message, color) {
    $.blockUI({
        baseZ: 2000,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: color,
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: 0.5,
            color: '#fff'
        },
        message: '<h2 class="blockUIMensaje">' + message + '</h2>'
    });

    setTimeout(function() {
        $.unblockUI();
    }, 2000);
}


function destroy_data_table(selector) {

    $('#' + selector).dataTable().fnClearTable();
    $('#' + selector).dataTable().fnDestroy();
}
