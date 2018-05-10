function onlyAlphabets(e, t) {
    var pass1 = document.getElementById('first_name');
    var pass2 = document.getElementById('last_name');
    //Store the Confimation Message Object ...
    var message = document.getElementById('middle_name');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        }
        else if (e) {
            var charCode = e.which;
        }
        else { return true; }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))

            return true;
        else {
            return false;
        }
    }
    catch (err) {
        alert(err.Description);
    }
}