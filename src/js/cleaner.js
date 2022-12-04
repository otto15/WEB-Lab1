function clean_input() {

    var elems = document.querySelectorAll(".selected");

    [].forEach.call(elems, function (el) {
        el.classList.remove("selected");
    });

    $('#x_value').val(undefined);
    $('#y_value').val("");
    $('#r_value').val(undefined);
}

function clean_table() {
    $.ajax({
        type: "DELETE",
        url: "src/php/index.php",
        async: false,
    });

    $('.info-table table tbody').html("");
}