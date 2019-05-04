function minDate() {
    var today = new Date();
    var dd = today.getDate() + 1;
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("min", today);
}

function minTime() {
    var x = document.getElementById("timefield").min = "08:00";
    var y = document.getElementById("timefield").max = "21:00";

    var d = new Date();
    var n = d.getHours() + 1;

    document.getElementById("timefield").setAttribute("min", x);
    document.getElementById("timefield").setAttribute("max", y);
}