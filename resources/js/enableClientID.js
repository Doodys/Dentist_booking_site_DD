function di_en() {
    var sel = document.getElementById("dropdown").value;
    if (sel == "NIE") {
        document.getElementById("id_input").style.visibility = "visible";
        document.getElementById("id_input_text").style.visibility = "visible";
        document.getElementById("full_form").style.visibility = "hidden";
        document.getElementById("form_part").required = false;
        document.getElementById("id_input").required = true;
    } else if (sel == "TAK") {
        document.getElementById("id_input").style.visibility = "hidden";
        document.getElementById("id_input_text").style.visibility = "hidden";
        document.getElementById("full_form").style.visibility = "visible";
        document.getElementById("form_part").required = true;
        document.getElementById("id_input").required = false;
    }
};