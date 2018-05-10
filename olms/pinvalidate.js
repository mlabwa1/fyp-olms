function checkPin()
{
    //Store the password field objects into variables ...
    var pin1 = document.getElementById('pin');
    var pin2 = document.getElementById('confirm_pin');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(pin1.value == pin2.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        pin2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "PIN Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pin2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "PIN Do Not Match!"
    }
}  