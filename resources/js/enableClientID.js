function di_en() {
    var sel = document.getElementById("dropdown").value;
    if (sel == "NIE") {
        document.getElementById("id_input").style.visibility = "visible";
        document.getElementById("id_input_text").style.visibility = "visible";
    } else if (sel == "TAK") {
        document.getElementById("id_input").style.visibility = "hidden";
        document.getElementById("id_input_text").style.visibility = "hidden";
    }
};