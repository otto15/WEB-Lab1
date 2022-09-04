function clean_input() {
    // const field = $('#x_value');
    // $('#x' + field.val()).removeClass('selected');
    // field.val("");
    $('#x_value').val(undefined);
    $('#y_value').val("");
    $('#r_value').val(undefined);
}

function clean_table() {
    let empty_table = ``;
    $('.info-table table tbody').html(empty_table);
    localStorage.removeItem("table");
}