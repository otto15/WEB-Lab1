const range = (start, end) => {
    const length = end - start;
    return Array.from({ length }, (_, i) => start + i);
}

var xRange = range(-5, 4);
var rRange = range(1, 6);

function init() {
    printBtns(xRange, ".x-buttons", "x-dot", "x_value");
    printBtns(rRange, ".r-buttons", "r-size", "r_value");

    var existing = localStorage.getItem('table');
    $('.info-table tbody').append(existing ? existing : "");
    getTable();
}

function printBtns(btnsAr, parent, className, targetClass) {
    for (var i = 0; i < btnsAr.length; i++) {
        var btn = document.createElement("input");
        btn.type = "button";
        btn.value = btnsAr[i];
        var buttons = $(parent);
        btn.classList.add(className);
        btn.id = className + i;
        btn.setAttribute("target", targetClass);
        btn.addEventListener("click", btnClick);
        buttons.append(btn);
    }
}

function getTable() {
    $.ajax({
        type: "GET",
        url: "src/php/index.php",
        async: false,
        success: function(response) {

            $('.info-table table tbody').html(response);
            

        },
        error: function(data) { 
            alert(data);
        }
    });
}

