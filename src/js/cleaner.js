function clean_input() {
    $('#x_value').val(undefined);
    $('#y_value').val("");
    $('#r_value').val(undefined);
}

function clean_table() {
    let empty_table = ``;
    $('.info-table table tbody').html(empty_table);
    localStorage.removeItem("table");
}