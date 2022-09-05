function processSubmit() {
    let x_value = $('#x_value').val();
    let y_value = $('#y_value').val();
    let r_value = $('#r_value').val();
    if (validate(x_value, y_value, r_value)) {
        $.ajax({
            type: "POST",
            url: "src/php/index.php",
            async: false,
            data: {"x": parseInt(x_value.trim()), "y": parseFloat(y_value.trim()), "r": parseInt(r_value.trim())},
            success: function(response) {
                var data = JSON.parse(response);
                var row = document.createElement("tr");
                row.appendChild(create_cell(data["x"]));
                row.appendChild(create_cell(data["y"]));
                row.appendChild(create_cell(data["r"]));
                row.appendChild(create_cell(data["current_time"]));
                row.appendChild(create_cell(data["finish_time"]));
                row.appendChild(create_cell(data["checked_hit"]));
                $('.info-table table tbody').append(row);

                var existing = localStorage.getItem('table');
                var tableToSave = existing ? existing + "<tr>" + row.innerHTML + "</tr>" : "<tr>" + row.innerHTML + "</tr>";
                localStorage.setItem('table', tableToSave);
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
