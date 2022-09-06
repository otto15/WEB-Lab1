function processSubmit() {
    let x_value = $('#x_value').val();
    let y_value = $('#y_value').val();
    let r_value = $('#r_value').val();
    const date = new Date();
    const offset = date.getTimezoneOffset();
    if (validate(x_value, y_value, r_value)) {
        $.ajax({
            type: "POST",
            url: "src/php/index.php",
            async: false,
            data: {"x": parseInt(x_value.trim()), "y": parseFloat(y_value.trim()), "r": parseInt(r_value.trim()), "utc": offset},
            success: function(response) {

                $('.info-table table tbody').html(response);
                

            },
            error: function(data) { 
                alert(data);
            }
        });
    }
}

function create_cell(value) {
    let cell = document.createElement("td");
    cell.innerText = value;
    return cell;
}
